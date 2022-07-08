const tabsButtons = document.querySelectorAll('.nav-tabs li')
const tabs = document.querySelectorAll('.tab-pane');

tabsButtons.forEach(button => button.addEventListener('click', (e) => {
  e.preventDefault();

  document.querySelector('.nav-tabs li.active').classList.remove('active');
  document.querySelector('.tab-pane.active').classList.remove('active');

  const clickedTab = e.currentTarget;
  const target = e.target;
  const activeTabId = target.getAttribute('href');

  clickedTab.classList.add('active');

  console.log(activeTabId)

  document.getElementById(activeTabId).classList.add('active');


}))