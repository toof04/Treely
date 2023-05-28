function googlelogin(){
    const provider = new firebase.auth.GoogleAuthProvider();
    firebase.auth().signInWithPopup(provider)
           .then(result=>{
        const user = result.user;
        document.write('check${user.displayName}')
    })
}