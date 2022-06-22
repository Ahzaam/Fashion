let carts = document.querySelectorAll('.add-cart');
let wish = document.querySelectorAll('.wish');
console.log(carts[1]); 
for(let i = 0; i < carts.length; i++) {

  let count = 1;
  carts[i].addEventListener('click', () => {
    let id = carts[i].getAttribute('id');
    document.getElementById(id).innerHTML = "<i class='fa fa-shopping-cart text-white'></i>" + "<span style='font-size:10px;' class='text-white'>" +  count + "</span> ";
    // localStorage.setItem('cartNumbers' , id);
    // console.log(localStorage.getItem('cartNumbers'), "item ID");
    count = count + 1;
  })
}

for(let j = 0; j < wish.length; j++) {
  let wishty = true;
  wish[j].addEventListener('click', () => {
    let id = carts[j].getAttribute('id');

    if(wishty){
      document.getElementById('w' +id).innerHTML = "<i class='fa fa-heart text-danger'></i>";
      wishty = false;
    }else{
      document.getElementById('w' +id).innerHTML = "<i class='fa fa-heart text-white'></i>";
      wishty = true;
    }

    // localStorage.setItem('Wish list' , id);
    // console.log(localStorage.getItem('Wish list',), "Wish list");

  })
}
