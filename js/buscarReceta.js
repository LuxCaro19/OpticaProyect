new Vue({

    el:'#buscarRut',

    data:{

        url:'https://optica1500project.herokuapp.com/',
        receteexiste: false ,
        rut:'',
        fecha:'',
        recetas:[],
        receta:{}
    },

    methods:{

        buscarPorRut: async function(){
            var recurso = "controllers/ControlBuscarRecetaRut.php";
            var form = new FormData();
            form.append("rut", this.rut);

            try{

                const resp = await fetch(this.url + recurso, {

                    method: "post",
                    body: form,

                });

                

                if(this.rut==""){
                    M.toast({html: 'Ingrese un rut'})

                }else{

                    const data = await resp.json();

                    this.recetas=data;
                    var cantidad=0;

                    for(i in data){

                        cantidad++;


                    }

                    
                    if(data==0){

                        
                        M.toast({html: 'Busqueda finalizada sin resultados'})
                        this.receteexiste = false;
                    }else{

                        M.toast({html: '¡Busqueda finalizada con exito! cantidad de recetas: '+cantidad})
                        this.receteexiste = true;
                    }
                }
                

            }catch(error){


                console.log(error);

            }

        },

        buscarPorFecha: async function(){

            this.fecha=M.Datepicker.getInstance(buscar_fecha);

            var recurso = "controllers/ControlBuscarRecetaFecha.php";
            var form = new FormData();
            form.append("fecha",this.fecha);
            

            try{

                const resp = await fetch(this.url + recurso, {

                    method: "post",
                    body: form,

                });

                if(this.fecha==""){
                    M.toast({html: 'Ingrese una fecha'})

                }else{

                    const data = await resp.json();

                    this.recetas=data;
                    var cantidad=0;

                    for(i in data){

                        cantidad++;


                    }

                    
                    if(data==0){

                        
                        M.toast({html: 'Busqueda finalizada sin resultados'})
                        this.receteexiste = false;
                    }else{

                        M.toast({html: '¡Busqueda finalizada con exito! cantidad de recetas: '+cantidad})
                        this.receteexiste = true;
                    }

                    

                }

            
            }catch(error){


                console.log(error);

            }




        },

        abrirModal:function(receta){


            this.receta = receta;

            var modal = document.getElementById('detalle_receta');
            var instance = M.Modal.getInstance(modal);
            instance.open();

        }

    },

    created(){

    },





});