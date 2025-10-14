<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payslip - {{ $payroll->employee->name }} - {{ date("F Y", mktime(0, 0, 0, $payroll->month, 1, $payroll->year)) }}</title>
    <style>
        @media print {
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 20px;
            }
            .no-print {
                display: none;
            }
            .page-break {
                page-break-after: always;
            }
        }
        
        .container {
            max-width: 800px;
            margin: auto;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .company-info {
            margin-bottom: 20px;
        }
        .employee-info {
            margin-bottom: 20px;
        }
        .salary-details {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .salary-details th, .salary-details td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .salary-details th {
            background-color: #f5f5f5;
        }
        .net-salary {
            text-align: right;
            font-size: 1.2em;
            margin-top: 20px;
        }
        .footer {
            margin-top: 40px;
            text-align: center;
        }
        .print-button {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        @media screen {
            body {
                background-color: #f0f0f0;
                padding: 20px;
            }
            .container {
                background-color: white;
                padding: 40px;
                box-shadow: 0 0 10px rgba(0,0,0,0.1);
            }
        }
    </style>
</head>
<body>
    <button onclick="window.print()" class="print-button no-print">Print Payslip</button>
    
    <div class="container">
        <div class="header">
            <h1>PAYSLIP</h1>
            <h3>{{ date("F Y", mktime(0, 0, 0, $payroll->month, 1, $payroll->year)) }}</h3>
        </div>

        <div class="company-info">
            <h2>Company Name</h2>
            <p>Address Line 1</p>
            <p>Address Line 2</p>
            <p>Phone: (123) 456-7890</p>
        </div>

        <div class="employee-info">
            <table width="100%">
                <tr>
                    <td width="50%">
                        <strong>Employee Name:</strong> {{ $payroll->employee->name }}<br>
                        <strong>Employee ID:</strong> {{ $payroll->employee->employee_id }}<br>
                        <strong>Department:</strong> {{ $payroll->employee->department->name }}<br>
                        <strong>Designation:</strong> {{ $payroll->employee->designation->name }}
                    </td>
                    <td width="50%" style="text-align: right">
                        <strong>Payslip #:</strong> {{ $payroll->id }}<br>
                        <strong>Payment Date:</strong> {{ $payroll->created_at->format('d/m/Y') }}<br>
                        <strong>Payment Status:</strong> {{ $payroll->payment_status ? 'Paid' : 'Unpaid' }}
                    </td>
                </tr>
            </table>
        </div>

        <table class="salary-details">
            <tr>
                <th colspan="2">Earnings</th>
                <th colspan="2">Deductions</th>
            </tr>
            <tr>
                <td>Basic Salary</td>
                <td style="text-align: right">{{ number_format($payroll->basic_salary, 2) }}</td>
                <td>Absent Deductions</td>
                <td style="text-align: right">{{ number_format($payroll->deduction_for_absent, 2) }}</td>
            </tr>
            <tr>
                <td>Allowances</td>
                <td style="text-align: right">{{ number_format($payroll->allowances, 2) }}</td>
                <td>Loan Deduction</td>
                <td style="text-align: right">{{ number_format($payroll->loan_deduction, 2) }}</td>
            </tr>
            <tr>
                <td>Bonuses</td>
                <td style="text-align: right">{{ number_format($payroll->bonuses, 2) }}</td>
                <td>Other Deductions</td>
                <td style="text-align: right">{{ number_format($payroll->deductions, 2) }}</td>
            </tr>
            <tr>
                <th>Total Earnings</th>
                <th style="text-align: right">
                    {{ number_format($payroll->basic_salary + $payroll->allowances + $payroll->bonuses, 2) }}
                </th>
                <th>Total Deductions</th>
                <th style="text-align: right">
                    {{ number_format($payroll->deduction_for_absent + $payroll->loan_deduction + $payroll->deductions, 2) }}
                </th>
            </tr>
        </table>

        <div class="net-salary">
            <strong>Net Salary:</strong> 
            <h2 style="margin: 0">{{ number_format($payroll->net_salary, 2) }}</h2>
        </div>

        @if($payroll->remarks)
        <div style="margin-top: 20px">
            <strong>Remarks:</strong>
            <p>{{ $payroll->remarks }}</p>
        </div>
        @endif

        <div class="footer">
            <p>This is a computer generated payslip and does not require signature.</p>
        </div>
    </div>
</body>
</html>