var categoriasNombres = [];
document.body.onload = () => {
  // Carga las categorias
  const url = `http://localhost:8080/ejercicio-tareas/Controllers/categoriasController.php`
  const xhr = new XMLHttpRequest();
  xhr.open('GET', url, true);

  xhr.onload = function() {
    if(this.status === 200) {
      let categorias = JSON.parse(this.responseText);

      let categoriasContendor = document.getElementById("tipo");
      categoriasContendor.innerHTML = '<option value="Todas">Todas</option>';

      categorias.forEach(categoria=> {
        categoriasNombres.push(categoria.nombre);
        categoriasContendor.innerHTML += `
          <option value="${categoria.id}">${categoria.nombre}</option>
        `;
      });

      consulta("Todas");
    }
  }

  xhr.send();

} 

function cambioOpcion(e) {
  consulta(e.value);
}

function consulta(categoria){
  const url = `http://localhost:8080/ejercicio-tareas/Controllers/tareasController.php?categoria=${categoria}`
  const xhr = new XMLHttpRequest();
  xhr.open('GET', url, true);

  xhr.onload = function() {
    if(this.status === 200) {
      let tareas = JSON.parse(this.responseText);

      let tareasContendor = document.getElementById("tareas");

      tareasContendor.innerHTML = "";
      tareas.forEach(tarea => {
        let cat = categoriasNombres[tarea.categoria_id-1];
        if(tarea.fecha_limite != undefined)
          cat += `- ${tarea.fecha_limite}`;
        tareasContendor.innerHTML += `
          <div class="tarea">
            <div class="titulo">${tarea.titulo}</div>
            <span class="cat">${cat}</span>
            <div class="descripcion">${tarea.descripcion}</div>
          </div>
        `;
      });

      console.log(tareas);
    }
  }

  xhr.send();
}
