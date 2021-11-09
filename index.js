
const changeActiveItem = () => {
    document.querySelectorAll('.menu-item').forEach(item => {
        item.classList.remove('active');
    })
}

document.querySelectorAll('.menu-item').forEach(item => {
    item.addEventListener('click', () => {
        changeActiveItem();
        item.classList.add('active');
        if(item.id != 'notifications'){
            document.querySelector('.notifications-popup').style.display = 'none';
        } else{
            document.querySelector('.notifications-popup').style.display = 'block';
            document.querySelector('#notifications .notification-count').style.display = 'none';
        }
    })
})


document.querySelector('#messages-notification').addEventListener('click', () => {
    document.querySelector('.messages').style.boxShadow = '0 0 1rem var(--color-primary)';
    messagesNotification.querySelector('.notification-count').style.display = 'none';
    setTimeout(() => {
        messages.style.boxShadow = 'none';
    }, 2000);
})

