new Vue ({
    el:'#gestionusuario',
    data:{
        url:'http://127.0.0.1/OpticaProyect/',
        usuarios: [],
        estados:[
        { nombre: 'BLOQUEADO', value: '0' },
        { nombre: 'HABILITADO', value: '1' },],
        formtype: "add",
        orut: "",
        vrut: "",
        vnombre:"",
        vclave:"",
        vestado:"1",
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
                this.vclave = "";
                this.orut = x.rut
                this.vrut = x.rut;
                this.vnombre = x.nombre;
                this.vestado = x.estado;
                this.alerta="";
                console.log(data);
                M.updateTextFields();
                

            } catch (error) {
                console.log(error);
            }

        },
        guardar : async function (){
            
            const recurso = "controllers/ControlEditarUsuario.php";
            var form = new FormData();
            form.append("rut",this.orut);
            form.append("editarRut", this.vrut);
            form.append("editarNombre", this.vnombre);
            form.append("editarClave", this.vclave);
            form.append("editarEstado", this.vestado);



            try {
                const res = await fetch(this.url + recurso, {
                method: "post",
                body: form,
            });
                const data = await res.json();
                this.alerta=data.msg
                console.log(data);
                if (data.msg.includes("modificado") ){
                    this.vaciar();
                    this.cargaUsuarios();
                    this.formtype = "add";
                    M.updateTextFields();
                };
            } catch (error) {
                    console.log(error);
            }
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
            }
            
        },
        vaciar : async function (){
            this.vnombre="";
            this.vrut    ="";
            this.vestado ="";
            this.vclave ="";
        },
    },
    created(){
        this.cargaUsuarios();
    }
});