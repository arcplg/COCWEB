(function($){
	({		
		init: function(){
			var self = this;

			$(function(){
				self.mobileAction();
				self.initWow();
				self.scroll();
				self.banner();
				self.counterOnScroll();
				self.sliderClients();
				self.sliderMember();
				self.technologySection();
				self.changeLanguage();
				self.jobListToggle();
				self.careers();
			});
		},

		initWow: function() {
			new WOW().init();
		},

		scroll: function() { 
			$(window).scroll(function(){
				var scroll_pos = $(window).scrollTop();
				var header_sp = $('header');
				if(scroll_pos > 69){
				  $('#header-global').addClass('on_scroll');
				  $('.box-popup').addClass('on_scroll');
				}else{
				  $('#header-global').removeClass('on_scroll').height('auto');
				  $('.box-popup').removeClass('on_scroll');
				}
				// Mobile
				if(scroll_pos >= 50) {
				  header_sp.addClass('on_scroll');
				}else {
				  header_sp.removeClass('on_scroll');
				}
			})
		},

		mobileAction: function() {
			// Open mobile menu
			$('.header .nav-toggle').click(function(){
				$(".mobile-sp").removeClass("off");
				$('html').css('overflow-y', 'hidden');
			});

			// Close mobile menu
			$('.mobile-sp_close').click(function() {
				$(".mobile-sp").addClass("off");
				$('html').css('overflow-y', 'auto');
			});

			// Click scroll to section
			$('.mobile-sp ul li.menu-item a').click(function() {
				$(".mobile-sp").addClass("off");
				$('html').css('overflow-y', 'auto');
			});
		},

		banner: function() {
			if ($('#banner-concrete').length <= 0) return ;
			particlesJS("banner-concrete", {
				particles: {
					number: { value: 20, density: { enable: true, value_area: 800 } },
					color: { value: "#ffffff" },
					shape: {
						type: "circle",
						stroke: { width: 0, color: "#000000" },
						polygon: { nb_sides: 5 },
						image: { src: "img/github.svg", width: 100, height: 100 }
					},
					opacity: {
						value: 0.6,
						random: false,
						anim: { enable: false, speed: 0.8, opacity_min: 0.1, sync: false }
					},
					size: {
						value: 3,
						random: true,
						anim: { enable: false, speed: 40, size_min: 0.1, sync: false }
					},
					line_linked: {
						enable: true,
						distance: 155,
						color: "#ffffff",
						opacity: 0.4,
						width: 1
					},
					move: {
						enable: true,
						speed: 6,
						direction: "none",
						random: false,
						straight: false,
						out_mode: "out",
						bounce: false,
						attract: { enable: false, rotateX: 600, rotateY: 1200 }
					}
				},
				interactivity: {
					detect_on: "canvas",
					events: {
						onhover: { enable: true, mode: "repulse" },
						onclick: { enable: true, mode: "push" },
						resize: true
					},
					modes: {
						grab: { distance: 400, line_linked: { opacity: 1 } },
						bubble: { distance: 400, size: 40, duration: 2, opacity: 8, speed: 3 },
						repulse: { distance: 200, duration: 0.4 },
						push: { particles_nb: 4 },
						remove: { particles_nb: 2 }
					}
				},
				retina_detect: true
			});
		},

		counterOnScroll: function () {
			var a = 0;
			if($('#counter').length == 0) return;
			$(window).scroll(function () {

				var oTop = $('#counter').offset().top - window.innerHeight;
				if (a == 0 && $(window).scrollTop() > oTop) {
					$('.counter-value').each(function () {
						var $this = $(this),
							countTo = $this.attr('data-count');
						$({
							countNum: $this.text()
						}).animate({
							countNum: countTo
						},
							{
								duration: 2000,
								easing: 'swing',
								step: function () {
									$this.text(Math.floor(this.countNum));
								},
								complete: function () {
									$this.text(this.countNum);
									//alert('finished');
								}

							});
					});
					a = 1;
				}

			});
		},

		sliderClients: function() {
			if ($('.p-home_clients_slider-clients_thumbnail').length) {
				$('.p-home_clients_slider-clients_thumbnail').slick({
					slidesToShow: 5,
					slidesToScroll: 1,
					dots: false,
					arrows: false,
					focusOnSelect: true,
					autoplay: true,
					responsive: [
						{
							breakpoint: 768,
							settings: {
								slidesToShow: 3
							}
						},
						{
							breakpoint: 672,
							settings: {
								slidesToShow: 2
							}
						},
						{
							breakpoint: 520,
							settings: {
								slidesToShow: 1
							}
						}
					]
				});
			}
		},

		technologySection: function() {
			function tech_team_section() {
				var $text_left = $('.p-home_technology_detail_box');
				var $tech_team = $('.p-home_technology_detail_img-team');
				var w_team = $tech_team.innerWidth();
				var height = 1089 * w_team / 1152;
				$tech_team.height(height);
				if(window.innerWidth >= 1400) {
					$text_left.height(height - 100)
				}else {
					$text_left.removeAttr('style');
				}
			}
			tech_team_section();
			$(window).resize(function() {
				tech_team_section();
			});
		},

		sliderMember: function() {
			function members_section() {
				setTimeout(() => {
					var $img_member = $('#slider-members img');
					var w_img_member = $img_member.innerWidth();
					var bg_before = document.getElementsByClassName("p-home_members_slider-members_thumbnail_item_bg-before");
					var bg_after = document.getElementsByClassName("p-home_members_slider-members_thumbnail_item_bg-after");

					$(bg_before).width(w_img_member);
					$(bg_before).height(w_img_member);

					$(bg_after).width(w_img_member);
					$(bg_after).height(w_img_member);	
				}, 3000);
			}
			members_section();

			$(window).resize(function() {
				members_section();
			});
		},

		changeLanguage: function() {
			var header = document.getElementById("language");
			var flags = header.getElementsByClassName("flag");
			for (var i = 0; i < flags.length; i++) {
				flags[i].addEventListener("click", function() {
					var flagActives = document.getElementsByClassName("active");
					flagActives[0].className = flagActives[0].className.replace(" active", "");
					this.className += " active";
					//Change current language
					var choosedLanguageEl = document.getElementById("choosed-language");
					var bgLang = choosedLanguageEl.style.backgroundImage;
					choosedLanguageEl.style.backgroundImage = bgLang.split("images/")[0] + "images/" + this.getAttribute('country') + ".jpg')";
				});
			}
			
		},

		jobListToggle: function() {
			$('.accordion-control').click(function() {
				var list_item = $(this).parents(".job-list_item");
				list_item.find(".job-content-wrapper").slideToggle(function(){
					list_item.toggleClass("active");
					list_item.siblings().not(list_item).removeClass("active");
					list_item.siblings().not(list_item).find(".job-content-wrapper").hide();
				});

				if ($(".job-list_item.active").length > 0) {
					$('html,body').animate({
						scrollTop: $(".job-list_item.active").offset().top
					}, 'slow');
				}
			});
		},

		careersFileCV: function() {
			var input = document.getElementById('fileCV');
			input.addEventListener('change', function (e) {
				var fileName = '';
				let label = input.nextElementSibling.nextElementSibling.querySelector('span');
				let language = document.body.id;

				if (this.files && this.files.length == 1) {
					fileName = e.target.value.split("\\").pop();
					label.innerHTML = (language == "vi") ? "1 tệp tin đã được chọn" : "1 file selected";
					label.style.color = "green";
				} else {
					label.innerHTML = (language == "vi") ? "Tải CV của bạn lên" : "Please choose file to upload";
					label.style.color = "#111";
				}
			})
		},

		careers: function () {
			if ($('.p-careers').length == 0) return; 
			this.careersFileCV();

			$('#apply-cv').on('click', function (e) {
				$('span.icon-loader').attr("style", "display:inline-block");
				$('#join-us_form_notice').css('display', 'none');

				var formData = new FormData();
				var fileInputElement = document.getElementById("fileCV");
				if (fileInputElement) {
					formData.append("file", fileInputElement.files[0]);
				}
				formData.append("candidate", $("#candidate").val());
				formData.append("language", document.body.id);	
				formData.append("position-name", $("#positionId option:selected").text());
				formData.append("position-id", Number($("#positionId").val()));
				formData.append("action", "send_career_cv");

				$.ajax({
					type: 'POST',
					url: "/wp-admin/admin-ajax.php",
					data: formData,
					contentType: false,
					dataType: 'JSON',
					processData: false,
					success: function (result) {
						let keys = Object.keys(result);
						let el;
						keys.forEach(key => {
							if (key != "isSuccess") {
								el = document.getElementById(key);
								el.closest('div.wrapper').nextElementSibling.innerHTML = result[key];
							}
						});
						$('.icon-loader').attr("style", "display:none");
						if(result['isSuccess']){ 
							$('#candidate, #positionId, #fileCV').val('');
							$('#join-us_form_notice').css('display', 'block');

							let language = document.body.id;
							let textUploadYourCV = (language == "vi") ? "Tải CV của bạn lên" : "Upload Your CV";

							// Reset fields empty
							$('.file-wrapper label span').text(textUploadYourCV).css('color', '#111');
							$('#candidate, #positionId, #fileCV').val('');							
							$('#join-us_form_notice-error').css('display', 'none');
						}else {
							$('#join-us_form_notice-error').css('display', 'block');
							$('#join-us_form_notice').css('display', 'none');						
						}
					},
					error: function (e) {
						$('.icon-loader').attr("style", "display:none");
					}
				});

				return false;
			});

			$('.job-list .applyBtn').click(function() {
				// $("html, body").animate({
				// 	scrollTop: $('.join-us_form .title').offset().top - 100
				// }, 100);
				let urlGoogleForm = 'https://docs.google.com/forms/d/e/1FAIpQLSeJxsMCd0nMWNlopQNPU8fW9oZwjCPMovjF1Ta6Qx0otgiUhQ/viewform';
				location.href = urlGoogleForm;
			});

		}
	}.init());

}(jQuery));
