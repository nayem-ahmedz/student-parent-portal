function myFun(tV, event){
    let activeTab = 't' + tV;
    let tabs = document.getElementsByClassName('tabs');
    for(let i=0; i<tabs.length; i++){
        tabs[i].style.display = 'none';
        }
    document.getElementById(activeTab).style.display = 'block';
    let tabButtons = document.getElementsByClassName('tab-name');
    for(let i=0; i<tabButtons.length; i++){
    tabButtons[i].classList.remove('ui-active');
        }
    event.target.classList.add('ui-active');
}
function showPanel(){
    left = document.getElementById('ui-LEFT');
    left.style.width = '200px';
}
function closePanel(){
    left = document.getElementById('ui-LEFT');
    left.style.width = '0';
}
let open = true;
function hideUserNav(){
    let heighT = document.getElementById('user-nav-x');
    if(!open){
        heighT.style.height = '0';
        open = true;
    } else{
        heighT.style.height = '110px';
        open = false;
    }
}