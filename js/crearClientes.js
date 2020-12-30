new Vue({

    el:'#creacionDeClientes',

    data:{

        url:'https://optica1500project.herokuapp.com/',
        respuesta:[],
        rut:'',
        nombre:'',
        direccion:'',
        telefono:'',
        fecha:'',
        email:''


    },

    methods:{

        crearCliente: async function(){
            this.fecha=M.Datepicker.getInstance(fecha_client);
            var recurso = "controllers/ControlCliente.php";
            var form = new FormData();

            form.append("rut",this.rut);
            form.append("nombre",this.nombre);
            form.append("direccion",this.direccion);
            form.append("telefono",this.telefono);
            form.append("fecha",this.fecha);
            form.append("email",this.email);

            try{

                const resp = await fetch(this.url + recurso, {

                    method: "post",
                    body: form,


                });
                const data = await resp.json();
                for (i in data) {
                    M.toast({html: data[i]})
                    if (data["msg"] == "Cliente creado exitosamente") {
                        this.rut= ""; 
                        this.nombre= ""; 
                        this.direccion= ""; 
                        this.telefono= ""; 
                        this.fecha= ""; 
                        this.email= ""; 
                      }
                  }     





            }catch(error){


                console.log(error);
                M.toast({html: 'Hubo un error, ERROR: '+error})
            

            }


            


        }


    },

    created(){



    }




});