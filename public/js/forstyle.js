
function loop(className,count){
    for (let i = 0; i < 7; i++) {
        let rec = document.createElement('div');
        let parRec = document.createElement('div');
        let box = document.getElementById(className);
        console.log(className);
        box.append(parRec);
        parRec.classList.add('d-flex');
        parRec.setAttribute('id',className+i)
        parRec.append(rec);
        rec.classList.add('rec');
        for (let j = 0; j < count ; j++) {
            let rec = document.createElement('div');
            let par = document.getElementById(className+i);
            par.append(rec);
            rec.classList.add('rec');
        }
    }
}

loop('box',4);
loop('boxTwo',9);

let skill = document.querySelector('.hero');

window.addEventListener("load",function (){
    $('.loader').fadeOut(1000);
    // new WOW().init();
});



let typed = $(".typed");
let typed_strings = typed.attr('data-typed-items')
typed_strings = typed_strings.split(',')
new Typed('.typed', {
    strings: typed_strings,
    loop: true,
    typeSpeed: 100,
    backSpeed: 50,
    backDelay: 2000
});

// new Waypoint({
//     element: document.getElementsByClassName('hero'),
//     offset : 50,
//     handler: function(direction) {
//         let progress = document.querySelectorAll('.progress .progress-bar');
//         console.log(progress);
//         alert('hello');
//
//         progress.forEach((el) => {
//             console.log(el.getAttribute('aria-valuenow'))
//             el.style.width = el.getAttribute('aria-valuenow') + '%'
//         });
//
//     }
// })



