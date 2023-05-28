function normallogin(){
     const email = document.getElementById('email').value;
      const password = document.getElementById('password').value;
    firebase.auth().signInWithEmailAndPassword(email, password)
  .then(result => {
      const user = result.user;
    const greetingElement = document.getElementById('greeting');
    const formElement = document.getElementById('form');
  formElement.remove();
      greetingElement.textContent = ` Hello, ${user.email}`;
      greetingElement.classList.add('heading');
      setTimeout(() => {
        // Redirect to another page after half a second
        window.parent.parent.location.href = 'firestoretester.html';
      }, 4500);
    })
  .catch((error) => {
    const greetingElement2 = document.getElementById('greeting');
    alert(`Error signing in`);
  });
}
function googlelogin() {

  const provider = new firebase.auth.GoogleAuthProvider();
  firebase.auth().signInWithPopup(provider)
    .then(result => {
      const user = result.user;
    const greetingElement = document.getElementById('greeting');
    const formElement = document.getElementById('form');
  formElement.remove();
      greetingElement.textContent = ` Hello, ${user.displayName}`;
      greetingElement.classList.add('heading');
      setTimeout(() => {
        // Redirect to another page after half a second
        window.parent.parent.location.href = 'firestoretester.html';
      }, 3500);
    })
     
}

function loadproducts(){
const db = firebase.firestore();
const storageRef = firebase.storage().ref();

db.collection('plantCollection')
  .get()
  .then((querySnapshot) => {
    const productsContainer = document.getElementById('products-container');

    querySnapshot.forEach(async (doc) => {
      const product = doc.data();
      
      const productBox = document.createElement('div');
      productBox.className='product';
      productBox.style.minHeight="600px";
      productBox.style.maxHeight="600px";
      productBox.style.overflow="hidden";


      const nameElement = document.createElement('h3');
      nameElement.className='shop-item-title';
      nameElement.textContent = product.name;

      const descriptionElement = document.createElement('p');
      descriptionElement.textContent = product.desc;

      const priceElement = document.createElement('p');
      priceElement.className='shop-item-price';
      priceElement.textContent = product.price;
        pnextline=document.createElement('p');
        pnextline.textContent='Price: Rs';
    
      
      const addcart = document.createElement('button');
  
       addcart.textContent = `ADD TO CART`;
     addcart.className='btn shop-item-button';
      productBox.appendChild(nameElement);
      productBox.appendChild(descriptionElement);
   

      const pricebuttonhelp = document.createElement('div');
      pricebuttonhelp.className='shop-items-details';
         pricebuttonhelp.appendChild(pnextline);
      pricebuttonhelp.appendChild(priceElement);


      // Get the image URL from Firebase Storage
      try {
        const imageUrl = await storageRef.child(`plants/${product.name}.png`).getDownloadURL();

        const imageElement = document.createElement('img');
        imageElement.src = imageUrl;
        imageElement.className='shop-item-image';
        productBox.appendChild(imageElement);
      } catch (error) {
        console.error('Error getting image URL:', error);
      }     
         
       pricebuttonhelp.appendChild(addcart);

        addcart.style.marginBottom="0px";
        productBox.appendChild(pricebuttonhelp);
      productsContainer.appendChild(productBox);
    });
  }
  )


  
 


setTimeout(runandloaded(),2000);
function runandloaded(){


}

        

}
