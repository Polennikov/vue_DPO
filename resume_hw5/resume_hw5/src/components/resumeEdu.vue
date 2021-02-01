<template>
  <div>
    <div><h3>Образование: {{education.educationlevel}}</h3></div>
    <div>Учебное заведение: {{education.university}}</div>
    <div>Факультет: {{education.faculty}}</div>
    <div>Специализация: {{education.spiciality}}</div>
    <div>Год окончания: {{education.eduyear}}</div>
  </div>
</template>

<script>
export default {
  name: "resumeEdu",
  props:['education'],
}
</script>