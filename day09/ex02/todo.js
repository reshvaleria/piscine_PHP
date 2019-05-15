document.getElementById('new').addEventListener("click", addToDo);
document.addEventListener("DOMContentLoaded", cookieLoad);
function cookieLoad() {
    let listExist = getCookie('listExist');
    let count = 0;
    for (let i = 0; i <= listExist; i++) {
        let toDo = getCookie(i);
        if (toDo) {
            let ft_list = document.getElementById('ft_list');
            let div = document.createElement("div");
            div.innerHTML = toDo;
            div.addEventListener("click", {handleEvent: deleteToDo, num: i, elem: div});
            ft_list.insertBefore(div, ft_list.firstChild);
            count++;
        }
    }
    if (!count)
        deleteCookie('listExist');
}
function addToDo () {
    let toDo = prompt("Which TO DO do you want to add?");
    if (toDo) {
        let ft_list = document.getElementById('ft_list');
        let div = document.createElement("div");
        div.innerHTML = toDo;
        let list = (getCookie('listExist')) ?
            parseInt(getCookie('listExist')) + 1 : 0;
        div.addEventListener("click", {handleEvent: deleteToDo, num: list, elem: div});
        ft_list.insertBefore(div, ft_list.firstChild);
        createCookie(list, toDo);
        createCookie('listExist', list);
    }
}
function deleteToDo(num, elem) {
    if (confirm('Do you really want to remove this TO DO?')){
        deleteCookie(this.num);
        this.elem.remove();
    }
}
function createCookie(name, value) {
    let date = new Date();
    date.setTime(date.getTime()+(24*60*1000));
    let expires = "; expires="+date.toGMTString();
    document.cookie = name+"="+value+expires;
}
function deleteCookie(cookieName) {
    let cookieDate = new Date();
    cookieDate.setTime (cookieDate.getTime() - 1);
    document.cookie = cookieName += "=; expires=" + cookieDate.toGMTString();
}
function getCookie (cookieName) {
    let res = document.cookie.match ('(^|;) ?' + cookieName + '=([^;]*)(;|$)');
    return (res) ? decodeURIComponent(res[2]) : null;
}
