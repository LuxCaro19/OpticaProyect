new Vue({
    el: "#formularioreceta",
    data: {
      url:'https://optica1500project.herokuapp.com/',
      materiales: [],
      tipos: [],
      armazones: [],
      cliente: [],
      clienteexiste: false,
      rutCliente:"",
      rutClienteSeleccionado:"",
      tipo_lentes:'',
      i_esfera:'',
      i_cilindro:'',
      i_eje:'',
      d_esfera:'',
      d_cilindro:'',
      d_eje:'',
      material_sel: '',
      tipo_sel: '',
      base_sel:'',
      armazon_sel: '',
      prisma:'',
      fecha_e:'',
      fecha_r:'',
      nom_med:'',
      rut_med:'',
      observacion:'',
      valor:'',
      distancia_p:'',
    },
    methods: {
      cargaMateriales: async function () {
        try {
          var recurso = "controllers/BuscarMaterialCristal.php";
          const res = await fetch(this.url + recurso);
          const data = await res.json();
          console.log(data);
          this.materiales = data;
        } catch (error) {
          console.log(error);
        }
      },
      cargaTipos: async function () {
        try {
          var recurso = "controllers/BuscarTipoCristal.php";
          const res = await fetch(this.url + recurso);
          const data = await res.json();
          console.log(data);
          this.tipos = data;
        } catch (error) {
          console.log(error);
        }
      },
      cargaArmazones: async function () {
        try {
          var recurso = "controllers/BuscarTipoArmazon.php";
          const res = await fetch(this.url + recurso);
          const data = await res.json();
          console.log(data);
          this.armazones = data;
        } catch (error) {
          console.log(error);
        }
      },
      crearReceta: async function () {
        if (this.rutClienteSeleccionado != ""){
          this.fecha_e = M.Datepicker.getInstance(fecha_entrega);
          this.fecha_r = M.Datepicker.getInstance(fecha_retiro);

          const recurso = "controllers/ControlCrearReceta.php";
          var form = new FormData();
          form.append("tipo_lente", this.tipo_lentes);
          form.append("esfera_oi", this.i_esfera);
          form.append("esfera_od", this.d_esfera);
          form.append("cilindro_oi", this.i_cilindro);
          form.append("cilindro_od", this.d_cilindro);
          form.append("eje_oi", this.i_eje);
          form.append("eje_od", this.d_eje);
          form.append("prisma", this.prisma);
          form.append("base", this.base_sel);
          form.append("armazon", this.armazon_sel);
          form.append("material_cristal", this.material_sel);
          form.append("tipo_cristal", this.tipo_sel);
          form.append("distancia_pupilar", this.distancia_p);
          form.append("valor_lente", this.valor);
          form.append("fecha_entrega", this.fecha_e);
          form.append("fecha_retiro", this.fecha_r);
          form.append("observacion", this.observacion);
          form.append("rut_cliente", this.rutClienteSeleccionado);
          form.append("rut_medico", this.rut_med);
          form.append("nombre_medico", this.nom_med);
          try {
              const res = await fetch(this.url + recurso, {
              method: "post",
              body: form,
            
          });
          const data = await res.json();
            for (i in data) {
              M.toast({html: data[i]})
            }                       
          } catch (error) {
              console.log(error);
              M.toast({html: 'hubo un error'})
          }  
        } else {
          M.toast({html: 'seleccione un cliente valido'})
        }

      },
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
          
        
            M.toast({html: data["msg"]});
            this.cliente=data;

            
          
            if (data["rut_cliente"] == null) {
              this.rutClienteSeleccionado = "";
              this.clienteexiste = false;
            } else {
              this.rutClienteSeleccionado = data["rut_cliente"];
              this.rutClienteSeleccionado = this.rutCliente;
              this.clienteexiste =  true;
            }
            
        } catch (error) {
            this.cliente=[]
            this.rutClienteSeleccionado="";
        }

    },
    },
    created() {
      this.cargaMateriales();
      this.cargaTipos();
      this.cargaArmazones();
    },
  });