window.addEventListener('scroll', () => {
    const nav = document.querySelector('.nav-menu')
    nav.classList.toggle('sticky',window.scrollY > 108)
})
