@echo off
REM Menjalankan server PHP di http://localhost:8080
REM Endpoint: http://localhost:8080/pertemuan_2/api/mahasiswa.php
cd /d "%~dp0.."
php -S localhost:8080 -t .
