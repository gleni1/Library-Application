const form = document.getElementById('form');
const username = document.getElementById('username');
const idnum = document.getElementById('idnum');
const email = document.getElementById('email');
const password = document.getElementById('password');
const password2 = document.getElementById('password2');
const pNum = document.getElementById('phone');
const lname = document.getElementById('lname');
const selectElement = document.querySelector('#cars');
const checkCheck = document.getElementById('accept');
const btn = document.querySelector('#btn333');
const sb = document.querySelector('#cars');
const submit = document.querySelector('#submit123');




checkCheck.addEventListener('change', (e)=>{
    if(e.target.checked){
        document.getElementById('req').innerText = "REQUIRED";
    }else{
        document.getElementById('req').innerText = "";
    }
    
})


const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

  
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};

const isValidEmail = email => {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

const isValidPassword = password =>{
    const re = /((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{4,10})/;
    return re.test(String(password));
}

const isValidId = idnum =>{
    const re = /^\d{8}$/;
    return re.test(String(idnum));
}

const isValidFirstName = username =>{
    const re = /([a-zA-Z])+\s*/;
    return re.test(String(username));
}

const isValidLastName = lname =>{
    const re = /([a-zA-Z])+\s*/;
    return re.test(String(lname));
}

const isValidPhone = pNum =>{
    const re = /^\s*(?:\+?(\d{1,3}))?([-. (]*(\d{3})[-. )]*)?((\d{3})[-. ]*(\d{2,4})(?:[-.x ]*(\d+))?)\s*$/;
    return re.test(String(pNum));
}


let count = 0;
let usern = false;
let lnm = false;
let psv = false;
let idv = false;
let emv = true;
let phv = false;



const validateInputs = () => {
    const usernameValue = username.value.trim();
    const emailValue = email.value.trim();
    const lnameValue = lname.value.trim();
    const idValue = idnum.value.trim();
    const passwordValue = password.value.trim();
    const phoneValue = pNum.value.replace(/\s/g, '').replace(/-/g, '');

    if(usernameValue === '') {
        alert("Book seller's first name missing. Please enter.");
        usern = false;
        return 0;
    } else if(!isValidFirstName(usernameValue)){
        alert('Incorrect name format.');
        usern = false;
        return 0;
    }else{
        count +=1;
        usern = true;
        setSuccess(username);
    }

    if(lnameValue === '') {
        alert("Last name is required");
        lnm = false
        return 0;
    } else if(!isValidLastName(lnameValue)){
        lnm = false;
        alert('Invalid last name format.')
    }else{
        count +=1;
        lnm = true;
        setSuccess(lname);
    }

    if(passwordValue === '') {
        alert('Password is required.');
        psv = false;
        return 0;
    } else if (!isValidPassword(passwordValue)) {
        alert('Incorrect password format.');
        psv = false;
        return 0;
    } else {
        count +=1;
        psv = true;
        setSuccess(password);
    }

    if(idValue === ''){
        alert("ID is required.");
        idv = false;
        return 0;
    }else if(!isValidId(idValue)){
        alert('ID should be 8 digits.');
        idv = false;
        return 0;
    }else{
        count +=1;
        idv = true;
        setSuccess(idnum);
    }

    var checkElement = document.getElementById('accept');

    if(emailValue === '') {
        if(checkElement.checked===true){
            alert('Email is required.');
            emv = false;
            return 0;
        }
        else{
            emv = true;
        }
    } else if (!isValidEmail(emailValue)) {
        alert('Please provide a valid email address.');
        emv = false;
        return 0;
    } else {
        count +=1;
        emv = true;
        setSuccess(email);
    }

    if(phoneValue === ''){
        alert('Phone number is required');
        phv = false;
        return 0;
    }else if(!isValidPhone(phoneValue)){
        alert('Phone number should be 10 digits.')
        phv = false;
        return 0;
    }else{
        count +=1;
        phv = true;
        setSuccess(pNum);
    }


    if(usern && lnm && psv && idv && emv && phv){

        
        if(selectElement.selectedIndex === 0){
            // return true;
            // alert('were here');
            window.location.href = "bookseller.php";
        }else if(selectElement.selectedIndex === 1){
            window.location.href = "purchaseform.php";
        }
        else if(selectElement.selectedIndex === 2){
            window.location.href = "returnorder.php";
        }
        else if(selectElement.selectedIndex === 3){
            window.location.href = "updateorder.php";
        }
        else if(selectElement.selectedIndex === 4){
            window.location.href = "cancelorder.php";
        }
        else if(selectElement.selectedIndex === 5){
            window.location.href = "createaccount.php";
        }
        else{
            // window.location.href = "order.php";
        }
        console.log("true");
        return true;
        
    }else{
        
        console.log("false");
        return false;
    }


};

// function verifyInput(){
//     validateInputs();
//     if(usern && lnm && psv && idv && emv && phv){
//         return true;
//     }else{
//         return false;
//     }
  
// }






// function verify(fName, lName, id, password, email)
// {
//     const salesmen = [
//         {name: "Glen", lastName: "Poleshi", password: "Njit2022.", 
//         id: "12345678", email: "glenipoleshi@gmail.com"},
//         {name: "John", lastName: "Dwayne", password: "Pclove21..", id: "98765432", email: "john3@gmail.com"},
//         {name: "Nick", lastName: "Cynthis", password: "Favshow32.", id: "45454563", email: "nci534@gmail.com"},
//         {name: "Abi", lastName: "Walter", password: "Emjeai54.", id: "96874532", email: "asdf32@gmail.com"},
//         {name: "Donald", lastName: "Horwitz", password: "Ndwfkdo65.", id: "19736482", email: "donidoni@gmail.com"},
//         {name: "Rick", lastName: "Linda", password: "pbKewd52k.", id: "52658584", email: "rikc@gmail.com"},
//         {name: "Melinda", lastName: "Gardner", password: "Walker2022.", id: "12341234", email: "melinda.gardner@gmail.com"},
    
//     ]
    
//     var text = selectElement.options[selectElement.selectedIndex].text;


//     for(let i = 0; i<salesmen.length; i++)
//     {
//         if(salesmen[i].name==fName && salesmen[i].lastName==lName && salesmen[i].password==password && salesmen[i].id==id)
//         {
//             //alert('WELCOME TO OUR BOOK STORE.\n' + 'Seller: ' + salesmen[i].name + ' ' + salesmen[i].lastName + "\n" + 'Action: ' + text)
//             if(selectElement.selectedIndex === 0){
//                 window.location.href = "bookseller.php";
//             }else{
//                 window.location.href = "order.php";
//             }
            
            
//         }
//         else{
//             alert('User cannot be found. Please check your entries.');
//                 return 0;
//         }
   
//     }
    
    
// }





// btn.onclick = (event) => {
//     event.preventDefault();
//     // show the selected index
//     alert(selectElement.selectedIndex);
    
// };



// form.addEventListener('submit', e => {
//     e.preventDefault();
//     if(usern && lnm && psv && idv && emv && phv){
        
//     }else{
//         console.log("dbflbsdf");
//     }
//     //console.log(count)

//     validateInputs();
    
// });

// function doNothing(){
//     alert("nothing");
// }


