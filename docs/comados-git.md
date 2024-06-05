# Comandos GIT
## Descargar e Instalar GIT

- https://git-scm.com/
- instalar
## Configuracion GIT
 ``` bash
 git config  --global user.name  "Cristian"
 git config  --global user.name  "vincs@mail.com"
 ```
 ## Necesitamos una cuenta en (GITHUB) o Bitbucket o GitLab
- https://github.com/
- crear un nuevo repositorio para su proyecto
 ---
 ## Crear o Clonar  el repositorio
 ---
 - Si ya existe el repositorio (clonar)
 ```
 git clone direccion_del_repo
 ```

 - Si no existe el repositorio (Iniciar)
 ```
 git init
 ```
 ## referencia el repositorio local (mi pc) con remoto (Github)
 - buscar la direcion  del repositorio en github
 ```
 git remote add origin  https://github.com/vincepari/proyecto2-laravel-API-VUE.git
 ```
 ---
 ### Para subir  los cambios al repositorio remoto
 ```
 git add .        nombre del archivo
 git  commit -m "proyecto base Laravel" 
 git push origin master
 ```
 -------------------
 | T1 | T2 | T3 |
 |----|----|----|
 | V1 | V2 | V3 |
 |----|----|----|
