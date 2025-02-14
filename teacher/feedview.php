<?php require('./templates/header.php') ?>

<?php require('./templates/navbar.php') ?>

<div id="layoutSidenav">

    <?php require('./templates/sidebar.php') ?>

    <div id="layoutSidenav_content" class="bg-light">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Feedback View</h1>      
                <style>
/* CSS Styles */

/* Basic dropdown container */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown button (trigger) */
.dropdown-button {
  background-color:rgb(232, 208, 156); 
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
  border-radius: 5px;
}

/* Dropdown content (hidden by default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 450px; /* Adjust as needed */
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  border-radius: 5px;
  padding: 10px;
}

/* Show the dropdown content when the button is hovered over/focused */
.dropdown:hover .dropdown-content, .dropdown:focus-within .dropdown-content {
  display: block;
}

/* Task box style */
.task-box {
  background-color: #fff;
  border: 1px solid #ddd;
  padding: 8px;
  margin-bottom: 5px;
  border-radius: 3px;
  word-wrap: break-word; /* Prevent long words from overflowing */
}

/* Add Task Form in Dropdown */
.add-task-form {
  margin-top: 10px;
}

.add-task-form input[type="text"] {
  width: 100%;
  padding: 8px;
  margin-bottom: 5px;
  border: 1px solid #ccc;
  border-radius: 3px;
  box-sizing: border-box; /* Important: includes padding and border in the element's total width and height */
}

.add-task-form button {
  background-color:rgb(244, 189, 137); /* Blue */
  color: white;
  padding: 10px 15px;
  border: none;
  border-radius: 3px;
  cursor: pointer;
  font-size: 14px;
}

.add-task-form button:hover {
  background-color: rgb(244, 189, 137);
}

/* Optional: Style for error messages */
.error-message {
  color: red;
  font-size: 0.9em;
  margin-top: 5px;
}

</style>
</head>
<body>

<div class="dropdown">
    <div class=" card shadow bg-white mb-5 " style="width:450px; height= 50px">
        <h3 style="text-align:center;">
            NAME
        </h3>
        <span style="text-align:center;"> course taught</span>
            <button class="dropdown-button">Feeds</button>
            <div class="dropdown-content">
                <!-- Task List -->
                <div id="task-list">
                <!-- Tasks will be added here dynamically -->
                </div>

                <!-- Add Task Form -->
                <div class="add-task-form">
                <input type="text" id="new-task-text" placeholder="Enter new task">
                <button onclick="addTask()">Add Task</button>
                <div id="error-message" class="error-message"></div>
                </div>
            </div>
    </div>

</div>
<div class="dropdown">
    <div class=" card shadow bg-white mb-5 " style="width:450px; height= 50px">
        <h3 style="text-align:center;">
            NAME
        </h3>
        <span style="text-align:center;"> course taught</span>
            <button class="dropdown-button">Feeds</button>
            <div class="dropdown-content">
                <!-- Task List -->
                <div id="task-list">
                <!-- Tasks will be added here dynamically -->
                </div>

                <!-- Add Task Form -->
                <div class="add-task-form">
                <input type="text" id="new-task-text" placeholder="Enter new task">
                <button onclick="addTask()">Add Task</button>
                <div id="error-message" class="error-message"></div>
                </div>
            </div>
    </div>
    

</div>


<script>
// JavaScript Functionality
function addTask() {
  const taskText = document.getElementById("new-task-text").value.trim();
  const taskList = document.getElementById("task-list");
  const errorMessage = document.getElementById("error-message");

  if (taskText === "") {
    errorMessage.textContent = "Task cannot be empty.";
    return;
  }

  errorMessage.textContent = ""; // Clear previous error messages

  const taskBox = document.createElement("div");
  taskBox.classList.add("task-box");
  taskBox.textContent = taskText;

  taskList.appendChild(taskBox);

  // Clear the input field after adding
  document.getElementById("new-task-text").value = "";
}


// Example initial tasks (optional - you can remove this if you want)
document.addEventListener("DOMContentLoaded", () => { // Run this code after the DOM is fully loaded.
  const taskList = document.getElementById("task-list");

  // You can add initial tasks programmatically here:
  const initialTasks = [
    "Grocery Shopping",
    "Pay Bills",
    "Read a Book"
  ];

  initialTasks.forEach(taskText => {
    const taskBox = document.createElement("div");
    taskBox.classList.add("task-box");
    taskBox.textContent = taskText;
    taskList.appendChild(taskBox);
  });
});


</script>

        <?php require('./templates/copyright.php') ?>
    </div>
</div>

<?php require('./templates/footer.php') ?>