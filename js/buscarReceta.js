new Vue({

    el:'#buscarRut',

    data:{

        url:'http://localhost/opticaProyect/',
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

                const data = await resp.json();
                this.recetas=data;

                

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

                const data = await resp.json();
                this.recetas=data;

                

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