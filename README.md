# Documentation Medphys Web App - X-Ray Machine Quality Report

This project is a web application developed in PHP, HTML, JavaScript, and CSS that helps medical physicists create quality reports for X-ray machines. The application allows users to enter the necessary data through a form, upload report photos, and export the data as JSON to a MAKE webhook. The application also integrates with a SQL database to store and retrieve the entered data. MAKE uses a predefined Google Documents template to receive the variables and present them in a detailed report ready for export as a PDF and sending to the client.
![image](https://github.com/user-attachments/assets/53277577-963b-47e3-b676-0d48285f8581)
![image](https://github.com/user-attachments/assets/57a50963-70c3-4a8f-88b3-a58e3b783436)
![image](https://github.com/user-attachments/assets/e3ba253f-dd82-43a5-ab83-9de95fe1bc3c)
![image](https://github.com/user-attachments/assets/9f562696-6d0e-450a-a34c-3ad599547a0f)
![image](https://github.com/user-attachments/assets/9e23c499-9ecd-4da5-b5fb-b43d28ce3cd0)
![image](https://github.com/user-attachments/assets/e080c81f-3c86-4588-a442-6c27665bdb3b)






## Features

- **Data Form**: Allows users to enter all the necessary data for the quality report.
- **Photo Upload**: Allows users to upload report photos.
- **JSON Export**: Exports the entered data as JSON to a MAKE webhook.
- **Integration with Google Documents**: Uses a predefined Google Documents template to generate the detailed report.
- **PDF Export**: The detailed report can be exported as a PDF and sent to the client using make and google Documents templates. All the reports will be saved on Drive.

## Project Instalation

- Clone this repository
- Create the databases {usuarios} for login {informes} with the form variables, which can be found in guardar_informe.php or actualizar.php
- Edit the config.php file with your SQL data.
- Create your free account on MAKE and create a new scenario, add a webhook, and copy the webhook address to the panel_administrativo.js file.
- Access the app in your browser and create your first report.
- Activate data reception on your MAKE webhook to receive the data structure. In the administrative panel, export the report and proceed to add the Google Documents template.
- Connect each variable with the document variables and save it.
- Export your report and you will be able to view it in your Google Drive.


## Contact Us
https://synergysolutions.space/
+57 3163714916 
