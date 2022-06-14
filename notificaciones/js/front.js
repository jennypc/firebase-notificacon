import { initializeApp } from "https://www.gstatic.com/firebasejs/9.8.2/firebase-app.js";
import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.8.2/firebase-analytics.js";
import { getMessaging, getToken, onMessage } from "https://www.gstatic.com/firebasejs/9.8.2/firebase-messaging.js";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
    apiKey: "AIzaSyD417G-raCnishcFaE9VwH2KPRiDRDXL1s",
    authDomain: "mensajes-307ff.firebaseapp.com",
    projectId: "mensajes-307ff",
    storageBucket: "mensajes-307ff.appspot.com",
    messagingSenderId: "876755473454",
    appId: "1:876755473454:web:03173b77516be96df1bbbf",
    measurementId: "G-901C9N1G4K"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);
const messaging = getMessaging(app);

    
const model = {
    init: function(){
        console.log("Iniciando modelo");
        this.PUSH_WEB_TOKEN = "BJUadyYJRch64rlN3smzry3eVwGowO4OzLS6UvFi7GdQ0Igak92fKogUeY89I3p3tU8GTEn8obI-42v1ZcL9ARY";
        this.FIREBASE_TOKEN = "AAAAzCKy1C4:APA91bGEIdtimjiTi9oech4g6dEohwID0JxrXVwB9IT_9C9CdMA4cFBvV0Sdlw5bkCySuErxSR_t8w1popvV9obDe_NFAdr-sTpCHpjZUGp533Oq6i09NN79SrBOcKCEAZw_tX27BMmk";   
    },
};

const view = {
    init: function(){
        console.log("Iniciando vista");
    },
    myButton: $("#autorizar")
};

const controller = {
  init: function(){
      console.log("Iniciando controller");
      model.init();
      view.init();
      this.autorizarOnClick();
      
  },
            
    obtenerToken: function(){
         const _self = this;
         getToken (messaging, { vapidKey: 'BJUadyYJRch64rlN3smzry3eVwGowO4OzLS6UvFi7GdQ0Igak92fKogUeY89I3p3tU8GTEn8obI-42v1ZcL9ARY'})
        .then((currentToken) => {
        if (currentToken) {
             console.log('Token actual para el cliente:', currentToken);
             _self.guardarToken(currentToken);
          } else {
            console.log('No hay token de registro disponible. Solicita permiso para generar uno.');
          }
        }).catch((err) => {
          console.log('Ocurrió un error al recuperar el token.', err);
        });
    },
    
    guardarToken: function(currentToken){
        var formData=new FormData();
        formData.append('token',currentToken);
        axios.post('./php/guardarToken.php',formData).then( respuesta=>{
            console.log(respuesta);
        }).catch( e=>{
            console.log(e);
        });
    },
    
    autorizarOnClick: function(){
      const _self = this;
      view.myButton.click(function(evt){
          evt.preventDefault();
          console.log("click en el boton");
          _self.obtenerToken();
      });
    }
    };

 
     let enableForegroundNotification=true;
        onMessage(messaging, (payload) => {
                console.log("mensaje recibido");
                if(enableForegroundNotification){
                    const {title, ...options}=JSON.parse(payload.data.notification);
                    navigator.serviceWorker.getRegistrations().then( registration =>{
                        registration[0].showNotification(title, options);
                    });
                }
        });

controller.init();