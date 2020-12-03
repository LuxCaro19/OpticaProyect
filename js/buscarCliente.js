new Vue ({
    el:'#buscarcliente',
    data:{
        url:'http://127.0.0.1/OpticaProyect/',
        rutCliente:"",
        cliente: [],
    },
    methods: {
        buscar : async function (){

            const recurso = "controllers/ControlBuscarCliente.php";
            var form = new FormData();
            form.append("rutCliente", this.rutCliente);
            try {
                const res = await fetch(this.url + recurso, {
                method: "post",
                body: form
            });
            const data = await res.json();
                this.cliente=data[0];
 
            } catch (error) {
                this.cliente={}
            }

        }
    },
    created(){
    }
});