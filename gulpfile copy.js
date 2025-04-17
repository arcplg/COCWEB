const { src, dest, watch, series, parallel, gulp } = require("gulp");
const env = require('node-env-file');
const sass = require('gulp-sass');
const plumber = require('gulp-plumber');
const notify = require("gulp-notify");
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const cssdeclsort = require('css-declaration-sorter');
const sassGlob = require('gulp-sass-glob'); // @importを纏めて指定
const browserSync = require('browser-sync');
const webpack = require('webpack'); // Let's use webpack.DefinePlugin
const	webpackStream = require('webpack-stream'); // Let's use webpack4

sass.compiler = require('node-sass');

env('.env');

const paths = {
	"root": "localhost:" + process.env.PORT_NUM,
  "cssDist": "./src/wp-content/themes/" + process.env.THEME_NAME + "/assets/css/",
  'cssSrc': "./src/wp-content/themes/" + process.env.THEME_NAME + "/assets/scss/**/*.css",
  "scssSrc": "./src/wp-content/themes/" + process.env.THEME_NAME + "/assets/scss/**/*.scss",
  "entry": "./src/wp-content/themes/" + process.env.THEME_NAME + "/assets/js/main.js",
	"jsSrc": "./src/wp-content/themes/" + process.env.THEME_NAME + "/assets/js/",
}

const compileSass = done => {
  const postcssPlugins = [
    autoprefixer({
      // browserlistはpackage.jsonに記載
      cascade: false,
    }),
    cssdeclsort({ order: 'smacss' /* alphabetical, smacss, concentric-css */ })
  ]

  src(paths.scssSrc)
    .pipe(plumber({
      errorHandler: notify.onError('Error: <%= error.message %>')
    }))
    .pipe(sassGlob())
    .pipe(sass({ outputStyle: 'compressed' }).on('error', sass.logError))
    .pipe(postcss(postcssPlugins))
    .pipe(dest(paths.cssDist))

  done();
}

const buildJS = done => {
  //Webpack JS bundle
  src(paths.entry)
    .pipe(plumber({
      errorHandler: notify.onError('Error: <%= error.message %>')
    }))
    .pipe(webpackStream({
      // watch: true, // webpack の watch ではなく gulp の watch を使う
      output: {
        filename: 'build/bundle.js'
      },
      module: {
        rules: [
          {
            // Target loader // .js
            test: /\.js$/,
            exclude: /node_modules/,
            use: [
                {
                    loader: 'babel-loader',
                    options: {
                        // ES5に変換
                        presets: ['@babel/preset-env', '@babel/preset-react']
                    },
                }
            ]
          },
        ],
      },
      resolve: {
        extensions: ['.js'],
        modules: [
          "node_modules"
        ],
        alias: {
          element_ui: 'element-ui/lib/index.js'
        }
      },
      //環境によってビルドする内容を分ける
      plugins: [
        new webpack.DefinePlugin({
          'process.env': {
            NODE_ENV: '"production"'
          }
        }),
        // new webpack.optimize.UglifyJsPlugin(),
        //new webpack.optimize.DedupePlugin(),  // ライブラリ間で依存しているモジュールが重複している場合、二重に読み込まないようにする
        new webpack.optimize.AggressiveMergingPlugin(),  //ファイルを細かく分析し、まとめられるところはできるだけまとめてコードを圧縮する
        // JQuery / JQueryライブラリのための定義
        new webpack.ProvidePlugin({
          jQuery: "jquery",
          $: "jquery",
          jquery: "jquery"
        }),
      ]
    }, null, function (err, stats) {
      /* Use stats to do more things if needed */
      if (stats.compilation.errors.length) {
        notify.onError({
          title: 'Webpack error',
          message: stats.compilation.errors[0].error,
          sound: 'Frog',
        });
      }
    }))
    .pipe(dest(paths.jsSrc))
    .pipe(notify("Bundle JS Success!"));

  done();
}

// ローカルサーバ起動
const buildServer = done => {
  browserSync.init({
    port: process.env.PORT_NUM,
    notify: true,
    // 静的サイト
    server: {
      baseDir: paths.root
    }
  })
  done()
}

// ブラウザ自動リロード
const browserReload = done => {
  browserSync.reload()
  done()
}

// ファイル監視
const watchFiles = () => {
  watch([paths.scssSrc, paths.cssSrc], series(compileSass));
  watch([paths.entry, paths.jsSrc + "module/**/*"], series(buildJS));
}

// exports.sass = compileSass;

exports.default = series(compileSass, buildServer, watchFiles);
exports.default = series(compileSass, buildJS, watchFiles);
