<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Basic reset */
        body, h1, h2, p, table, td, th {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        /* Page setup for A4 */
        @page {
            size: A4;
            margin: 15mm; /* Set page margins */
        }

        /* Body styling */
        body {
            font-size: 12px;
            color: #333;
            background-color: #fff;
            line-height: 1.5;
        }

        .content {
            padding: 10px;
            
        }

        /* Header Styling */
        header {
            text-align: center;
            margin-bottom: 20px;
        }

        header p {
            font-size: 14px;
            margin: 2px 0;
            font-weight: bold;
        }

        /* Label styling for form fields */
        .content label {
            font-size: 12px;
            margin-bottom: 4px;
            font-weight: bold;
            display: block;
            color: #333;
        }

        /* Data entry styling */
        .data-entry {
            font-size: 12px;
            background-color: #f4f4f4;
            padding: 6px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            width: 200px;
            
        }
        .table-1 {
            font-size: 12px;
            background-color: #f4f4f4;
            padding: 6px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
          
            
        }
        .table-2 {
            font-size: 12px;
            background-color: #f4f4f4;
            padding: 6px;
            margin-bottom: 10px;
            border: 1px solid #ccc;          
            
        }
        .data-entry-feedback {
            font-size: 12px;
            background-color: #f4f4f4;
            padding: 6px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            
        }

        /* Information section */
        .info-section {
            margin-bottom: 20px;
            
        }

        /* Table styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table th, table td {
            padding: 6px;
            text-align: left;
            font-size: 12px;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        table td {
            background-color: #fafafa;
        }

        /* Footer styling */
        footer {
            text-align: center;
            font-size: 12px;
            color: #333;
            margin-top: 20px;
            padding: 5px 0;
        }

        /* Printing adjustments */
        @media print {
            body {
                font-size: 12px;
            }

            .content {
                padding: 10px;
            }

            footer {
                position: absolute;
                bottom: 15mm;
                width: 100%;
                text-align: center;
                font-size: 12px;
            }
        }
    </style>
</head>

<body>
    <header>
        <p>Republic of the Philippines</p>
        <p>Department of Health</p>
        <p>Regional Office No. 2</p>
        <p>Cagayan Valley Medical Center</p>
    </header>

           <table class="table-1">
            <thead>
                <tr>
                    <th >               
                    <label>Name:</label>                   
                    </th>
                    <th>                 
                    <label>Gender:</label>                  
                    </th>
                </tr>               
            </thead>
            <tbody>
                    <tr>
                        <td><?= $respondents2['name']; ?></td>
                        <td><?= $respondents2['gender']; ?></td>                        
                    </tr>               
            </tbody>
        </table>

        <table class="table-2">
            <thead>
                <tr>
                    <th>               
                    <label>Age:</label>                   
                    </th>
                    <th>                 
                    <label>Region:</label>                  
                    </th>
                </tr>               
            </thead>
            <tbody>
                    <tr>
                        <td><?= $respondents2['age']; ?></td>
                        <td><?= $respondents2['region']; ?></td>                        
                    </tr>               
            </tbody>
        </table>

        <table>
            <thead>
                <tr>
                    <th>Number</th>
                    <th>Question</th>
                    <th>Answer</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($respondents as $res): ?>
                    <tr>
                        <td><?= esc($res['question_id']) ?></td>
                        <td><?= esc($res['question']) ?></td>
                        <td><?= esc($res['response_value']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <footer>
        <p><label>Feedback:</label>
        <div class="data-entry-feedback"><?= $respondents2['service_feedback']; ?></div></p>
    </footer>
</body>

</html>
