document.addEventListener('DOMContentLoaded', () => {
    const container = document.querySelector('#mv')
    if (!container) return
  
    const images1 = container.querySelectorAll('.mv_img_effect_move')
    const images2 = container.querySelectorAll('.mv_img_effect_move2')
  
    container.addEventListener('mousemove', (e) => {
      const { width, height, left, top } = container.getBoundingClientRect()
      const mouseX = e.clientX - left
      const mouseY = e.clientY - top
  
      images1.forEach((image, index) => {
        const offsetMultiplier = Math.random() * 10
        const delay = index * 0.1
        const moveX = (mouseX / width - 0.5) * -20 * offsetMultiplier
        const moveY = (mouseY / height - 0.5) * -20 * offsetMultiplier
        gsap.to(image, {
          x: moveX,
          y: moveY,
          duration: 5,
          ease: 'power2.out',
          delay: delay,
        })
      })
  
      images2.forEach((image, index) => {
        const delay = index * 0.5
        const offsetMultiplier = Math.random() * 5
        const moveX = (mouseX / width - 0.5) * -20 * offsetMultiplier
        const moveY = (mouseY / height - 0.5) * -20 * offsetMultiplier
        gsap.to(image, {
          x: moveX,
          y: moveY,
          rotate: Math.random() * 70,
          duration: 10,
          ease: 'power2.out',
          delay: delay,
        })
      })
    })
  })
  