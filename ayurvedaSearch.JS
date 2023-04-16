const search = document.getElementById("search");
const products = document.getElementsByClassName("product");

search.addEventListener("keyup", () => {
    const term = search.value.toLowerCase();
    const words = term.split(" ");

    Array.from(products).forEach((product) => {
        const title = product.getElementsByTagName("h7")[0].innerText.toLowerCase();
        let match = true;

        words.forEach((word) => {
            if (title.indexOf(word) == -1) {
                match = false;
            }
        });

        if (match) {
            product.style.display = "block";
        } else {
            product.style.display = "none";
        }
    });
});


const modalLinks = document.querySelectorAll('.modal-link');
const modals = document.querySelectorAll('.modal');
const closeBtns = document.querySelectorAll('.close-btn');

modalLinks.forEach((link) => {
    link.addEventListener('click', (event) => {
        event.preventDefault();
        const modalId = link.getAttribute('data-modal-id');
        const modal = document.getElementById(modalId);
        modal.style.display = 'block';
    });
});

closeBtns.forEach((btn) => {
    btn.addEventListener('click', () => {
        const modal = btn.closest('.modal');
        modal.style.display = 'none';
    });
});

window.addEventListener('click', (event) => {
    modals.forEach((modal) => {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    });
});


$('.button').click(function(){
    var buttonId = $(this).attr('id');
    $('#modal-container').removeAttr('class').addClass(buttonId);
    $('body').addClass('modal-active');
  })
  
  $('#modal-container').click(function(){
    $(this).addClass('out');
    $('body').removeClass('modal-active');
  });