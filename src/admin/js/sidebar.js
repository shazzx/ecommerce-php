let sidebarController = document.querySelector('.sidebar_controller');
let sidebarClose = document.querySelector('.sidebar_close')
let sidebarText = document.querySelectorAll('.sidebar_text');
console.log('bhelo')


sidebarController.addEventListener('click', () => {
    sidebarController.classList.toggle('sidebar_item-hide');
    sidebarClose.classList.toggle("sidebar_item-hide")
    sidebarText.forEach((item, i) => {
        item.classList.toggle('sidebar_item-hide')
    }) 
})

sidebarClose.addEventListener('click', () => {
    sidebarController.classList.toggle('sidebar_item-hide');
    sidebarClose.classList.toggle("sidebar_item-hide")
    sidebarText.forEach((item, i) => {
        item.classList.toggle('sidebar_item-hide')
    })
})