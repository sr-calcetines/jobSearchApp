# 👔 Job Search App  
This project is about a website to store and organize the different job offers. The website offers us a main view where there is a table with integrated CRUD that shows the offer data as well as two forms to edit or create new offers and a show view for an specific offer; It is also possible to add news to each offer through endpoints. Created using [Laravel](https://laravel.com) framework.

## 🌄 Project views  
![image](https://github.com/user-attachments/assets/c703a994-e248-497e-86ce-96338538c245)
*Main view*

![image](https://github.com/user-attachments/assets/07b3e4f0-e6e5-4003-a346-3bf85e8483a4)
*Show view*

![image](https://github.com/user-attachments/assets/67f2c98e-4cc4-4f9c-a8fe-60aa8ee02c19)
*Edit Form*

![image](https://github.com/user-attachments/assets/c3ab5737-70f4-4cfd-9324-fe1f65596782)
*Create Form*

## 💻 Languages ​​and tools  
![](https://skillicons.dev/icons?i=php,html,css,js)
![](https://skillicons.dev/icons?i=laravel,git,github,vscode,)

## ⚙️ Installation prerequisites
🟢Install [Node.js](https://nodejs.org/en/download/source-code)

🟢Install [Composer](https://getcomposer.org/download/)

## 🛠️ Installation Guide 
0️⃣ Before starting to install the project, you will need to create a database (we have used mysql via xampp) and name it: `jobsearchapp` 

1️⃣ Open a terminal in the folder where you want the repository to be cloned and enter this command:

`git clone https://github.com/sr-calcetines/jobSearchApp.git`

2️⃣ As you clone the repository, it will appear all the elements on it; you need to rename the file ".env.example" to ".env" and fill it with theese values:

![image](https://github.com/user-attachments/assets/dfbef369-46af-4e45-8742-65daab4e53fd)

2️⃣ In your preferred environment, open the project you cloned; you will need three consoles for the next step.

▷Console 1:
    `npm install` `npm run dev`
    
▷Console 2:
    `composer install` `php artisan serve`
    
▷Console 3: 
    `php artisan migrat:fresh`
    `php artisan migrat:fresh --seed`
    
3️⃣ In the second console that you have opened, press the ctrl key and click on the link to localhost that it offers you. It should take you to the main view of the project where the offers are located.

⚠️ If you have done the previous steps and the view has not opened correctly, go back to the third command console and enter this:

`php artisan key:generate` `php artisan config:cache` 

## 🌐 Endpoints 
We have generated six endpoints, four for each CRUD function, one extra for the show button and another to add news to each offer.

### ✏️ Create Offer (POST)
`http://127.0.0.1:8000/api/offers`

### 📖 Read Offer (GET)
`http://127.0.0.1:8000/api/offers`

### ✏️✏️ Update Offer (PUT)
`http://127.0.0.1:8000/api/offers/id`

### ❌ Destroy Offer (DELETE)
`http://127.0.0.1:8000/api/offers/id`

### 👁️ Show Offer (GET)
`http://127.0.0.1:8000/api/offers/id`

-------------------------------------------------------------------------------------------------------------------------------------------------------

### ✏️ Create News (POST)
`http://127.0.0.1:8000/api/offers/id/follows`

### 📖 Read News (GET)
`http://127.0.0.1:8000/api/offers/id/follows`

### ✏️✏️ Update News (PUT)
`http://127.0.0.1:8000/api/offers/id/follows/id`

### ❌ Destroy News (DELETE)
`http://127.0.0.1:8000/api/offers/id/follows/id`

### 👁️ Show News (GET)
`http://127.0.0.1:8000/api/offers/id/follows/id`

## 🧪 Tests 
All tests passed. Introduce this line on your console to check it:

`./vendor/bin/phpunit tests`

<p align="center">
  <img src="https://github.com/user-attachments/assets/9a87c279-4177-46ac-97d8-32574587a201" alt="PHP test" width="500"/>
</p>

If you want to launch the tests and view them you can put these commands in console 3:

`php artisan test --coverage` `php artisan test --coverage-html=coverage-report`

<p align="center">
  <img src="https://github.com/user-attachments/assets/19b4a0f5-95bb-4d9f-9531-372f6a65c310" alt="PHP test coverage" width="500"/>
</p>

<p align="center">
  <img src="https://github.com/user-attachments/assets/bb1b11f0-f569-4392-82d9-ad8e2cd867f2" alt="Descripción de la imagen" width="500"/>
</p>

## 🗂️ Diagram made (DDBB) 
For the correct structuring of the database, we have carried out this test in [drawSQL](https://drawsql.app) that will serve as a basis for the creation of the future table.

<p align="center">
  <img src="https://github.com/user-attachments/assets/3790cf8f-d0e9-4fcb-97d9-a0883e28d002" alt="Descripción de la imagen" width="200"/>
</p>

## 👩‍💻 About me  
DAW graduate, im a developer enhancing my skills through a bootcamp focused on frontend, backend, and AWS.
- [José Ignacio Gavilán Sánchez](https://github.com/sr-calcetines)
