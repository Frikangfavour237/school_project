<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .content {
    padding: 20px;
    margin-left: 220px; /* Adjust based on sidebar width */
    padding-top: 80px; /* Adjust based on header height */
  }
  
  .section {
    width:800px;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
  }
  
  .breadcrumb {
    color: #777;
    margin-bottom: 15px;
  }
  
  h2 {
    margin-top: 0;
  }
  
  .field label {
    display: block;
    margin-bottom: 5px;
    color: #555;
  }
  
  .field input,
  .field textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
  }
  
  textarea {
    height: 100px;
    resize: vertical;
  }
  
  button {
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s;
    margin-right: 10px;
  }
  
  button:hover {
    background-color: #0056b3;
  }
  
    </style>
</head>
<body>
<main class="content">
        <div class="section">
            <h2>Absent Application</h2>
            <p class="breadcrumb">Manage / Subject / Add Subject</p>

            <form>
                <h3>Send Absent Application</h3>
                <div class="field">
                    <label for="date">Date</label>
                    <input type="date" id="date" name="date">
                </div>
                <div class="field">
                    <label for="days">Number of Days</label>
                    <input type="number" id="days" name="days">
                </div>
                <div class="field">
                    <label for="reason">Reason</label>
                    <textarea id="reason" name="reason" placeholder="Reason for being absent..."></textarea>
                </div>
                <button type="submit">Submit</button>
                <button type="reset">Reset</button>
            </form>
        </div>
    </main>
</body>
</html>