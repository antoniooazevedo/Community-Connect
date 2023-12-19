const notificationIcon = document.querySelector(".notifications-icon");
const notificationsContainer = document.querySelector(".notifications-container");

if (notificationIcon) {
  notificationIcon.addEventListener("click", (event) => {
    event.preventDefault();
    if (notificationsContainer.style.display === 'none' || !notificationsContainer.style.display) {
        notificationsContainer.style.display = 'flex';
      } else {
        hide(notificationsContainer);
      }
  });
}


