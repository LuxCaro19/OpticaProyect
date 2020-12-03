new Vue ({
    el:'#gestionusuario',
    data:{
        url:'http://127.0.0.1/OpticaProyect/',
        usuarios: [],
        formtype: "add",
        orut: "",
        vrut: "",
        vnombre:"",
        vclave:"",
        vestado:"",
        rut:"",
        alerta:""
        
    },
    methods: {
        cargaUsuarios: async function () {
            try {
              var recurso = "controllers/ControlCargarTablaUsuario.php";
              const res = await fetch(this.url + recurso);
              const data = await res.json();
            
              //este for cambia el estado y el color
            for(x of data) {
                if (x.estado =="0") {
                    x.estado = "BLOQUEADO";
                    x.color = "red-text";
                } else {
                    x.estado = "HABILITADO";
                    x.color = "black-text";
                }
            }

              this.usuarios = data;
              console.log(data);
            } catch (error) {
              console.log(error);
            }
          },
        editar : async function (rut){

            const recurso = "controllers/ControlTablaU.php";
            var form = new FormData();
            form.append("bt_edit", rut);
            try {
                const res = await fetch(this.url + recurso, {
                method: "post",
                body: form
            });
            const data = await res.json();
                this.formtype = "edit";
                x = data[0];
                this.vrut = x.rut;
                this.vnombre = x.nombre;
                this.vestado = x.estado;
                console.log(data);
                M.updateTextFields();
                

            } catch (error) {
                console.log(error);
            }

        },
        guardar : async function (){
            this.formtype = "add";
            this.vaciar();
            M.updateTextFields();
        },
        crear : async function (){
            const recurso = "controllers/ControlCrearUsuario.php";
            var form = new FormData();
            form.append("crearRut", this.vrut);
            form.append("crearNombre", this.vnombre);
            form.append("crearClave", this.vclave);
            M.updateTextFields();
            try {
                const res = await fetch(this.url + recurso, {
                method: "post",
                body: form,
            });
            const data = await res.json();
                this.alerta=data.msg
                
                
                if (data.msg.includes("creado") ){
                    this.vaciar();
                    this.cargaUsuarios();
                };
            } catch (error) {
                console.log(error);
                this.alerta="";
            }
            
        },
        vaciar : async function (){
            this.vnombre="";
            this.vrut    ="";
            this.vestado ="";
            this.orut   ="";
            this.vclave ="";
        },
    },
    created(){
        this.cargaUsuarios();
    }
});