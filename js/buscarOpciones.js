new Vue({
    el: "#listaTipos",
    data: {
      materiales: [],
      tipos: [],
      armazones: [],
      url:'http://127.0.0.1/OpticaProyect/',
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

    },
    methods: {
      cargaMateriales: async function () {
        try {
          var recurso = "controllers/buscarMaterialCristal.php";
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
          var recurso = "controllers/buscarTipoCristal.php";
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
          var recurso = "controllers/buscarTipoArmazon.php";
          const res = await fetch(this.url + recurso);
          const data = await res.json();
          console.log(data);
          this.armazones = data;
        } catch (error) {
          console.log(error);
        }
      },
      crearReceta: async function () {
        alert("termino ej javascript y listo");
      },
    },
    created() {
      this.cargaMateriales();
      this.cargaTipos();
      this.cargaArmazones();
    },
  });