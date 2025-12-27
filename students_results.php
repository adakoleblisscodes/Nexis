<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results Management - Nexis</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <style>
        :root {
            --navy-blue: #0a1a3a;
            --navy-blue-light: #1a2a4a;
            --gold-primary: #d4af37;
            --gold-secondary: #f4d03f;
            --sidebar-width: 260px;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background-color: #f8fafc;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            overflow-x: hidden;
        }
        
        /* Sidebar Styles */
        #sidebar {
            width: var(--sidebar-width);
            background: linear-gradient(180deg, var(--navy-blue) 0%, var(--navy-blue-light) 100%);
            color: white;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 1000;
            box-shadow: 3px 0 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
        }
        
        .sidebar-header {
            padding: 25px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            flex-shrink: 0;
        }
        
        .logo-container {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .logo-container img {
            height: 45px;
            width: auto;
        }
        
        .platform-name {
            font-size: 20px;
            font-weight: 700;
            color: white;
        }
        
        .sidebar-nav {
            padding: 20px 0;
            flex: 1;
            overflow-y: auto;
        }
        
        .nav-item {
            margin-bottom: 5px;
        }
        
        .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
            text-decoration: none;
        }
        
        .nav-link:hover, .nav-link.active {
            background: rgba(212, 175, 55, 0.15);
            color: white;
            border-left: 3px solid var(--gold-primary);
        }
        
        .nav-link i {
            width: 20px;
            text-align: center;
            font-size: 18px;
        }
        
        .sidebar-footer {
            padding: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            flex-shrink: 0;
        }
        
        .student-info {
            text-align: center;
        }
        
        .student-id {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 5px;
        }
        
        .student-class {
            font-size: 14px;
            color: var(--gold-secondary);
            font-weight: 600;
        }
        
        /* Main Content */
        #content {
            margin-left: var(--sidebar-width);
            padding: 25px;
            transition: all 0.3s ease;
            min-height: 100vh;
        }
        
        /* Top Header */
        .top-header {
            background: white;
            padding: 20px 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .page-title h1 {
            color: var(--navy-blue);
            font-weight: 700;
            margin-bottom: 5px;
            font-size: 28px;
        }
        
        .welcome-text {
            color: #666;
            font-size: 14px;
        }
        
        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .student-avatar {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--navy-blue), var(--navy-blue-light));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 20px;
        }
        
        .student-details h3 {
            font-size: 16px;
            color: var(--navy-blue);
            margin-bottom: 5px;
        }
        
        .student-details p {
            font-size: 12px;
            color: #666;
        }
        
        /* Class Selection Toggle */
        .selection-toggle {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
            text-align: center;
        }
        
        .toggle-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }
        
        .toggle-btn {
            padding: 12px 25px;
            background: #f8f9fa;
            color: var(--navy-blue);
            border: 2px solid #ddd;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
        }
        
        .toggle-btn:hover {
            background: #e9ecef;
            border-color: var(--navy-blue);
        }
        
        .toggle-btn.active {
            background: var(--navy-blue);
            color: white;
            border-color: var(--navy-blue);
        }
        
        .toggle-btn i {
            font-size: 16px;
        }
        
        /* Class Selection Form */
        .class-selection {
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
            display: none;
        }
        
        .class-selection.active {
            display: block;
            animation: fadeIn 0.5s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .form-title {
            font-size: 20px;
            color: var(--navy-blue);
            font-weight: 700;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .form-title i {
            color: var(--gold-primary);
        }
        
        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
        }
        
        .form-group {
            display: flex;
            flex-direction: column;
        }
        
        .form-label {
            font-size: 14px;
            color: #666;
            margin-bottom: 8px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .form-label i {
            color: var(--gold-primary);
            font-size: 12px;
        }
        
        .form-select {
            padding: 12px 15px;
            border: 1.5px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
            color: var(--navy-blue);
            background: white;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .form-select:hover, .form-select:focus {
            border-color: var(--navy-blue);
            outline: none;
        }
        
        .form-button {
            background: var(--navy-blue);
            color: white;
            border: none;
            padding: 14px 30px;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
            justify-content: center;
            margin-top: 10px;
            grid-column: 1 / -1;
            max-width: 200px;
            justify-self: center;
        }
        
        .form-button:hover {
            background: var(--navy-blue-light);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }
        
        .form-button:disabled {
            background: #ccc;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }
        
        /* Current Average Section */
        .average-container {
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
            text-align: center;
        }
        
        .average-title {
            font-size: 16px;
            color: #666;
            margin-bottom: 15px;
        }
        
        .average-value {
            font-size: 48px;
            font-weight: 800;
            color: var(--navy-blue);
            margin-bottom: 10px;
        }
        
        .average-term {
            color: #666;
            font-size: 14px;
            margin-bottom: 20px;
        }
        
        /* Academic Overview */
        .academic-overview {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .overview-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            display: flex;
            align-items: center;
            gap: 20px;
            transition: transform 0.3s ease;
        }
        
        .overview-card:hover {
            transform: translateY(-5px);
        }
        
        .overview-icon {
            width: 60px;
            height: 60px;
            background: rgba(212, 175, 55, 0.1);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .overview-icon i {
            color: var(--gold-primary);
            font-size: 28px;
        }
        
        .overview-content {
            flex: 1;
        }
        
        .overview-title {
            font-size: 14px;
            color: #666;
            margin-bottom: 5px;
        }
        
        .overview-value {
            font-size: 32px;
            font-weight: 800;
            color: var(--navy-blue);
            margin-bottom: 5px;
        }
        
        .overview-trend {
            font-size: 12px;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .trend-up {
            color: #28a745;
        }
        
        .trend-down {
            color: #dc3545;
        }
        
        /* Performance Chart - LINE GRAPH VERSION */
        .performance-section {
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
        }
        
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            flex-wrap: wrap;
            gap: 15px;
        }
        
        .section-title {
            color: var(--navy-blue);
            font-weight: 700;
            font-size: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .section-title i {
            color: var(--gold-primary);
        }
        
        /* Line Graph Styles */
        .graph-stats {
            display: flex;
            gap: 20px;
            background: #f8f9fa;
            padding: 10px 20px;
            border-radius: 8px;
            border: 1px solid #e9ecef;
        }
        
        .stat-item {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        .stat-label {
            font-size: 12px;
            color: #666;
            margin-bottom: 3px;
        }
        
        .stat-value {
            font-size: 16px;
            font-weight: 700;
            color: var(--navy-blue);
        }
        
        .graph-container {
            height: 320px;
            position: relative;
            margin-top: 20px;
            padding: 0 15px 40px 60px;
        }
        
        /* Graph grid with percentage markers */
        .graph-grid-lines {
            position: absolute;
            top: 0;
            left: 60px;
            right: 15px;
            bottom: 40px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            pointer-events: none;
        }
        
        .grid-line {
            border-top: 1px solid #e9ecef;
            position: relative;
        }
        
        .grid-value {
            position: absolute;
            left: -55px;
            top: -10px;
            font-size: 12px;
            color: #666;
            font-weight: 500;
            background: white;
            padding: 2px 6px;
            border-radius: 3px;
            border: 1px solid #e9ecef;
            width: 50px;
            text-align: right;
        }
        
        /* Graph canvas */
        .graph-canvas {
            width: 100%;
            height: 100%;
            position: relative;
        }
        
        /* Graph line */
        .graph-line {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            fill: none;
            stroke-width: 3;
            stroke-linecap: round;
            stroke-linejoin: round;
        }
        
        .performance-line {
            stroke: var(--navy-blue);
            stroke-width: 3;
            fill: none;
        }
        
        .performance-area {
            fill: rgba(10, 26, 58, 0.1);
            stroke: none;
        }
        
        /* Data points */
        .data-point {
            position: absolute;
            width: 12px;
            height: 12px;
            background: white;
            border: 3px solid var(--navy-blue);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 10;
        }
        
        .data-point:hover {
            transform: translate(-50%, -50%) scale(1.5);
            box-shadow: 0 4px 12px rgba(10, 26, 58, 0.2);
            background: var(--navy-blue);
        }
        
        .data-point.highlight {
            background: var(--gold-primary);
            border-color: var(--gold-primary);
            transform: translate(-50%, -50%) scale(1.3);
            box-shadow: 0 4px 12px rgba(212, 175, 55, 0.3);
        }
        
        /* Data point tooltip */
        .data-tooltip {
            position: absolute;
            background: var(--navy-blue);
            color: white;
            padding: 8px 12px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
            z-index: 100;
            pointer-events: none;
            opacity: 0;
            transform: translate(-50%, -100%);
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
        
        .data-tooltip::after {
            content: '';
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            border: 6px solid transparent;
            border-top-color: var(--navy-blue);
        }
        
        /* X-axis labels */
        .x-axis {
            position: absolute;
            bottom: 0;
            left: 60px;
            right: 15px;
            height: 40px;
            display: flex;
            justify-content: space-between;
            padding-top: 10px;
        }
        
        .x-label {
            font-size: 12px;
            color: #666;
            font-weight: 500;
            text-align: center;
            transform: rotate(-45deg);
            transform-origin: top left;
            white-space: nowrap;
            padding-left: 5px;
        }
        
        /* Average line */
        .average-line {
            position: absolute;
            left: 60px;
            right: 15px;
            height: 2px;
            background: linear-gradient(to right, transparent, var(--gold-primary), transparent);
            z-index: 5;
        }
        
        .average-line::before {
            content: '';
            position: absolute;
            left: 0;
            top: -4px;
            width: 10px;
            height: 10px;
            background: var(--gold-primary);
            border-radius: 50%;
        }
        
        .average-label {
            position: absolute;
            right: 0;
            top: -25px;
            font-size: 12px;
            color: var(--navy-blue);
            background: white;
            padding: 4px 8px;
            border-radius: 4px;
            border: 1px solid var(--gold-primary);
            font-weight: 600;
        }
        
        /* Graph footer */
        .graph-footer {
            margin-top: 20px;
            padding-top: 15px;
            border-top: 1px solid #e9ecef;
        }
        
        .graph-legend {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        
        .legend-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .legend-line {
            width: 20px;
            height: 3px;
            background: var(--navy-blue);
            border-radius: 2px;
        }
        
        /* Loading animation for line */
        @keyframes drawLine {
            from { stroke-dashoffset: 1000; }
            to { stroke-dashoffset: 0; }
        }
        
        @keyframes fadeInPoints {
            from { opacity: 0; transform: translate(-50%, -50%) scale(0); }
            to { opacity: 1; transform: translate(-50%, -50%) scale(1); }
        }
        
        /* Results Table */
        .results-section {
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
        }
        
        .section-title {
            color: var(--navy-blue);
            font-weight: 700;
            font-size: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 25px;
        }
        
        .section-title i {
            color: var(--gold-primary);
        }
        
        .table-container {
            overflow-x: auto;
            margin-top: 20px;
        }
        
        .results-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .results-table th {
            background: #f8f9fa;
            padding: 15px;
            text-align: left;
            color: var(--navy-blue);
            font-weight: 600;
            font-size: 14px;
            border-bottom: 2px solid #eee;
        }
        
        .results-table td {
            padding: 15px;
            border-bottom: 1px solid #eee;
            font-size: 14px;
        }
        
        .results-table tr:hover {
            background: #f8f9fa;
        }
        
        .grade-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            display: inline-block;
            min-width: 40px;
            text-align: center;
        }
        
        .grade-A {
            background: rgba(40, 167, 69, 0.1);
            color: #28a745;
        }
        
        .grade-B {
            background: rgba(23, 162, 184, 0.1);
            color: #17a2b8;
        }
        
        .grade-C {
            background: rgba(255, 193, 7, 0.1);
            color: #ffc107;
        }
        
        .grade-D {
            background: rgba(220, 53, 69, 0.1);
            color: #dc3545;
        }
        
        .grade-F {
            background: rgba(108, 117, 125, 0.1);
            color: #6c757d;
        }
        
        /* Download Options */
        .download-section {
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
        }
        
        .download-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        
        .download-card {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 25px;
            border: 1px solid #e9ecef;
            transition: all 0.3s ease;
        }
        
        .download-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            border-color: var(--gold-primary);
        }
        
        .download-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
        }
        
        .download-title {
            font-weight: 700;
            color: var(--navy-blue);
            font-size: 16px;
        }
        
        .download-format {
            background: rgba(212, 175, 55, 0.1);
            color: var(--gold-primary);
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .download-details {
            color: #666;
            font-size: 14px;
            margin: 15px 0;
            line-height: 1.6;
        }
        
        .download-actions {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }
        
        .btn-primary {
            background: var(--navy-blue);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
            width: 100%;
            justify-content: center;
        }
        
        .btn-primary:hover {
            background: var(--navy-blue-light);
            transform: translateY(-2px);
        }
        
        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 15px;
            margin-top: 30px;
            justify-content: center;
        }
        
        .btn-outline {
            padding: 12px 25px;
            background: white;
            color: var(--navy-blue);
            border: 1.5px solid #ddd;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
        }
        
        .btn-outline:hover {
            background: #f8f9fa;
            border-color: var(--navy-blue);
        }
        
        /* No Results Message */
        .no-results {
            text-align: center;
            padding: 40px 20px;
            color: #666;
            display: none;
        }
        
        .no-results.active {
            display: block;
        }
        
        .no-results i {
            font-size: 48px;
            color: #ddd;
            margin-bottom: 15px;
        }
        
        .no-results h3 {
            color: var(--navy-blue);
            margin-bottom: 10px;
        }
        
        /* Current Class Info */
        .current-class-info {
            background: rgba(212, 175, 55, 0.1);
            border-radius: 8px;
            padding: 15px 20px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-left: 4px solid var(--gold-primary);
        }
        
        .class-info-text {
            font-size: 14px;
            color: var(--navy-blue);
        }
        
        .class-info-detail {
            font-weight: 600;
            color: var(--navy-blue);
            background: white;
            padding: 5px 15px;
            border-radius: 20px;
            border: 1px solid rgba(212, 175, 55, 0.3);
        }
        
        /* Toggle Button for Mobile */
        #sidebarCollapse {
            display: none;
            background: var(--navy-blue);
            color: white;
            border: none;
            border-radius: 6px;
            padding: 8px 15px;
            margin-bottom: 20px;
        }
        
        /* Responsive */
        @media (max-width: 1200px) {
            .graph-container {
                height: 280px;
            }
        }
        
        @media (max-width: 992px) {
            #sidebar {
                margin-left: -260px;
            }
            
            #sidebar.active {
                margin-left: 0;
            }
            
            #content {
                margin-left: 0;
            }
            
            #sidebarCollapse {
                display: block;
            }
            
            .download-grid {
                grid-template-columns: 1fr;
            }
            
            .form-grid {
                grid-template-columns: 1fr;
            }
            
            .academic-overview {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .toggle-buttons {
                flex-direction: column;
            }
            
            .graph-container {
                height: 250px;
                padding-left: 50px;
            }
            
            .grid-value {
                left: -45px;
            }
            
            .graph-stats {
                flex-wrap: wrap;
                justify-content: center;
            }
        }
        
        @media (max-width: 768px) {
            .action-buttons {
                flex-direction: column;
            }
            
            .download-actions {
                flex-direction: column;
            }
            
            .section-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .academic-overview {
                grid-template-columns: 1fr;
            }
            
            .current-class-info {
                flex-direction: column;
                gap: 10px;
                text-align: center;
            }
            
            .graph-container {
                height: 220px;
                padding-left: 45px;
            }
            
            .grid-value {
                left: -40px;
                font-size: 11px;
            }
            
            .x-label {
                font-size: 11px;
            }
        }
        
        @media (max-width: 576px) {
            .graph-container {
                height: 200px;
                padding-left: 40px;
                padding-bottom: 35px;
            }
            
            .grid-value {
                left: -35px;
                font-size: 10px;
            }
            
            .x-label {
                font-size: 10px;
            }
            
            .graph-stats {
                width: 100%;
                justify-content: space-around;
            }
            
            .stat-item {
                min-width: 70px;
            }
            
            .data-point {
                width: 10px;
                height: 10px;
                border-width: 2px;
            }
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
   <?php include "includes/students_sidebar.php" ?>

    <!-- Main Content -->
    <div id="content">
        <!-- Top Header -->
        <button type="button" id="sidebarCollapse" class="btn">
            <i class="fas fa-bars"></i>
        </button>
        
        <div class="top-header">
            <div class="page-title">
                <h1>Results Management System</h1>
                <p class="welcome-text">View your academic performance and download results</p>
            </div>
            <div class="user-info">
                <div class="student-avatar">AJ</div>
                <div class="student-details">
                    <h3>Alex Johnson</h3>
                    <p>Grade 10A | Roll No: 15</p>
                </div>
            </div>
        </div>

        <!-- Selection Toggle -->
        <div class="selection-toggle">
            <h3 style="color: var(--navy-blue); margin-bottom: 15px;">Select View Mode</h3>
            <div class="toggle-buttons">
                <button class="toggle-btn active" data-mode="default">
                    <i class="fas fa-user"></i> My Current Results
                </button>
                <button class="toggle-btn" data-mode="class">
                    <i class="fas fa-search"></i> Search by Class
                </button>
            </div>
        </div>

        <!-- Class Selection Form -->
        <div class="class-selection" id="classSelection">
            <div class="form-title">
                <i class="fas fa-sliders-h"></i> Select Class to View Results
            </div>
            
            <div class="form-grid">
                <!-- Class Level -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-graduation-cap"></i> Class Level
                    </label>
                    <select class="form-select" id="classLevel">
                        <option value="">-- Select Class Level --</option>
                        <option value="primary">Primary School</option>
                        <option value="junior">Junior Secondary</option>
                        <option value="senior">Senior Secondary</option>
                        <option value="advanced">Advanced Level</option>
                    </select>
                </div>
                
                <!-- Class Name -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-school"></i> Class
                    </label>
                    <select class="form-select" id="className" disabled>
                        <option value="">-- Select Class Level First --</option>
                    </select>
                </div>
                
                <!-- Section -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-layer-group"></i> Section
                    </label>
                    <select class="form-select" id="section" disabled>
                        <option value="">-- Select Class First --</option>
                    </select>
                </div>
                
                <!-- Term -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-calendar-alt"></i> Term/Semester
                    </label>
                    <select class="form-select" id="term" disabled>
                        <option value="">-- Select Section First --</option>
                    </select>
                </div>
                
                <button class="form-button" id="viewResultsBtn" disabled onclick="loadClassResults()">
                    <i class="fas fa-eye"></i> View Class Results
                </button>
            </div>
        </div>

        <!-- Current Class Info -->
        <div class="current-class-info" id="currentClassInfo">
            <div class="class-info-text">
                Currently viewing results for: 
            </div>
            <div class="class-info-detail" id="currentClassDetail">
                Grade 10A - Term 2 (Default)
            </div>
        </div>

        <!-- Current Average -->
        <div class="average-container">
            <div class="average-title">Current Term Average</div>
            <div class="average-value" id="currentAverage">88.5%</div>
            <div class="average-term" id="currentTerm">Term 2 - 2023/2024 Academic Year</div>
            <button class="btn-outline" onclick="viewDetailedAnalysis()" style="margin-top: 10px;">
                <i class="fas fa-chart-pie"></i> View Detailed Analysis
            </button>
        </div>

        <!-- Academic Overview -->
        <div class="academic-overview">
            <div class="overview-card">
                <div class="overview-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div class="overview-content">
                    <div class="overview-title">Current GPA</div>
                    <div class="overview-value">3.85</div>
                    <div class="overview-trend trend-up">
                        <i class="fas fa-arrow-up"></i>
                        0.15 from last term
                    </div>
                </div>
            </div>
            
            <div class="overview-card">
                <div class="overview-icon">
                    <i class="fas fa-percentage"></i>
                </div>
                <div class="overview-content">
                    <div class="overview-title">Overall Score</div>
                    <div class="overview-value">88.5%</div>
                    <div class="overview-trend trend-up">
                        <i class="fas fa-arrow-up"></i>
                        2.3% improvement
                    </div>
                </div>
            </div>
            
            <div class="overview-card">
                <div class="overview-icon">
                    <i class="fas fa-trophy"></i>
                </div>
                <div class="overview-content">
                    <div class="overview-title">Class Rank</div>
                    <div class="overview-value">4/35</div>
                    <div class="overview-trend trend-down">
                        <i class="fas fa-arrow-down"></i>
                        1 position change
                    </div>
                </div>
            </div>
            
            <div class="overview-card">
                <div class="overview-icon">
                    <i class="fas fa-book"></i>
                </div>
                <div class="overview-content">
                    <div class="overview-title">Subjects</div>
                    <div class="overview-value">8</div>
                    <div class="overview-trend">
                        6 Core + 2 Electives
                    </div>
                </div>
            </div>
        </div>

        <!-- Performance Chart - LINE GRAPH VERSION -->
        <div class="performance-section">
            <div class="section-header">
                <h2 class="section-title">
                    <i class="fas fa-chart-line"></i> Academic Performance Trend
                </h2>
                <div class="graph-stats">
                    <div class="stat-item">
                        <span class="stat-label">Average:</span>
                        <span class="stat-value">87.3%</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">Highest:</span>
                        <span class="stat-value">95%</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">Lowest:</span>
                        <span class="stat-value">82%</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">Range:</span>
                        <span class="stat-value">13%</span>
                    </div>
                </div>
            </div>
            
            <div class="graph-container">
                <!-- Graph grid with percentage markers -->
                <div class="graph-grid-lines">
                    <div class="grid-line">
                        <span class="grid-value">100%</span>
                    </div>
                    <div class="grid-line">
                        <span class="grid-value">90%</span>
                    </div>
                    <div class="grid-line">
                        <span class="grid-value">80%</span>
                    </div>
                    <div class="grid-line">
                        <span class="grid-value">70%</span>
                    </div>
                    <div class="grid-line">
                        <span class="grid-value">60%</span>
                    </div>
                </div>
                
                <!-- Graph canvas for SVG line -->
                <div class="graph-canvas" id="graphCanvas">
                    <!-- SVG line graph will be drawn here -->
                </div>
                
                <!-- X-axis labels -->
                <div class="x-axis" id="xAxis">
                    <!-- X-axis labels will be generated here -->
                </div>
                
                <!-- Average line indicator -->
                <div class="average-line" style="bottom: 87.3%;">
                    <span class="average-label">Average: 87.3%</span>
                </div>
            </div>
            
            <div class="graph-footer">
                <div class="graph-legend">
                    <div class="legend-item">
                        <div class="legend-line"></div>
                        <span>Performance Score</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Results Table -->
        <div class="results-section" id="resultsSection">
            <h2 class="section-title">
                <i class="fas fa-list-alt"></i> Detailed Results
            </h2>
            <div class="table-container">
                <table class="results-table">
                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Code</th>
                            <th>Continuous (40%)</th>
                            <th>Examination (60%)</th>
                            <th>Total (100%)</th>
                            <th>Grade</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody id="resultsTable">
                        <!-- Results will be populated by JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Download Options -->
        <div class="download-section">
            <h2 class="section-title">
                <i class="fas fa-download"></i> Download Results
            </h2>
            
            <div class="download-grid">
                <!-- PDF Report -->
                <div class="download-card">
                    <div class="download-header">
                        <div class="download-title">Official Result Sheet</div>
                        <span class="download-format">PDF</span>
                    </div>
                    <div class="download-details">
                        Download your official result sheet in PDF format. This document is signed and stamped by the school administration.
                    </div>
                    <div class="download-actions">
                        <button class="btn-primary" onclick="downloadResultPDF()">
                            <i class="fas fa-file-pdf"></i> Download PDF
                        </button>
                    </div>
                </div>
                
                <!-- Excel Report -->
                <div class="download-card">
                    <div class="download-header">
                        <div class="download-title">Detailed Results Spreadsheet</div>
                        <span class="download-format">Excel</span>
                    </div>
                    <div class="download-details">
                        Download a comprehensive Excel spreadsheet containing all your result details for detailed analysis.
                    </div>
                    <div class="download-actions">
                        <button class="btn-primary" onclick="downloadResultExcel()">
                            <i class="fas fa-file-excel"></i> Download Excel
                        </button>
                    </div>
                </div>
                
                <!-- Printable Report -->
                <div class="download-card">
                    <div class="download-header">
                        <div class="download-title">Printable Report Card</div>
                        <span class="download-format">Printable</span>
                    </div>
                    <div class="download-details">
                        Generate a printable report card formatted for printing. Clean, printer-friendly layout.
                    </div>
                    <div class="download-actions">
                        <button class="btn-primary" onclick="printReportCard()">
                            <i class="fas fa-print"></i> Print Report
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="action-buttons">
            <button class="btn-outline" onclick="requestCorrection()">
                <i class="fas fa-edit"></i> Request Correction
            </button>
            <button class="btn-outline" onclick="shareResults()">
                <i class="fas fa-share-alt"></i> Share with Parents
            </button>
            <button class="btn-outline" onclick="viewHistory()">
                <i class="fas fa-history"></i> View Result History
            </button>
        </div>
    </div>

    <script>
        // Data structure for different class levels
        const classData = {
            primary: {
                name: "Primary School",
                classes: [
                    { name: "Primary 1", sections: ["A", "B", "C"], terms: ["Term 1", "Term 2", "Term 3"] },
                    { name: "Primary 2", sections: ["A", "B", "C"], terms: ["Term 1", "Term 2", "Term 3"] },
                    { name: "Primary 3", sections: ["A", "B", "C"], terms: ["Term 1", "Term 2", "Term 3"] },
                    { name: "Primary 4", sections: ["A", "B"], terms: ["Term 1", "Term 2", "Term 3"] },
                    { name: "Primary 5", sections: ["A", "B"], terms: ["Term 1", "Term 2", "Term 3"] },
                    { name: "Primary 6", sections: ["A", "B"], terms: ["Term 1", "Term 2", "Term 3"] }
                ]
            },
            junior: {
                name: "Junior Secondary",
                classes: [
                    { name: "JSS 1", sections: ["A", "B", "C", "D"], terms: ["Term 1", "Term 2", "Term 3"] },
                    { name: "JSS 2", sections: ["A", "B", "C", "D"], terms: ["Term 1", "Term 2", "Term 3"] },
                    { name: "JSS 3", sections: ["A", "B", "C", "D"], terms: ["Term 1", "Term 2", "Term 3"] }
                ]
            },
            senior: {
                name: "Senior Secondary",
                classes: [
                    { name: "SSS 1", sections: ["Science A", "Science B", "Arts A", "Commerce A"], terms: ["Term 1", "Term 2", "Term 3"] },
                    { name: "SSS 2", sections: ["Science A", "Science B", "Arts A", "Commerce A"], terms: ["Term 1", "Term 2", "Term 3"] },
                    { name: "SSS 3", sections: ["Science A", "Science B", "Arts A", "Commerce A"], terms: ["Term 1", "Term 2", "Term 3"] }
                ]
            },
            advanced: {
                name: "Advanced Level",
                classes: [
                    { name: "A-Level 1", sections: ["Science", "Arts", "Commerce"], terms: ["Semester 1", "Semester 2"] },
                    { name: "A-Level 2", sections: ["Science", "Arts", "Commerce"], terms: ["Semester 1", "Semester 2"] }
                ]
            }
        };

        // Default student results data - More subjects for better chart
        const defaultStudentData = {
            average: 88.5,
            gpa: 3.85,
            rank: "4/35",
            subjectCount: 8,
            term: "Term 2",
            subjects: [
                { subject: "Mathematics", code: "MATH101", continuous: 36, examination: 56, total: 92, grade: "A", remarks: "Excellent performance" },
                { subject: "Physics", code: "PHY102", continuous: 34, examination: 52, total: 86, grade: "B+", remarks: "Very good understanding" },
                { subject: "Chemistry", code: "CHEM103", continuous: 35, examination: 53, total: 88, grade: "A", remarks: "Good practical skills" },
                { subject: "Biology", code: "BIO104", continuous: 37, examination: 54, total: 91, grade: "A", remarks: "Excellent in theory" },
                { subject: "English Language", code: "ENG105", continuous: 33, examination: 49, total: 82, grade: "B", remarks: "Improve writing skills" },
                { subject: "Computer Science", code: "CS106", continuous: 38, examination: 57, total: 95, grade: "A", remarks: "Outstanding programming" },
                { subject: "History", code: "HIS107", continuous: 32, examination: 47, total: 79, grade: "B", remarks: "Satisfactory performance" },
                { subject: "Physical Education", code: "PE108", continuous: 39, examination: 56, total: 95, grade: "A", remarks: "Excellent physical fitness" }
            ],
            performance: [
                { subject: "Mathematics", score: 82 },
                { subject: "Physics", score: 86 },
                { subject: "Chemistry", score: 88 },
                { subject: "Biology", score: 91 },
                { subject: "English", score: 82 },
                { subject: "Computer Science", score: 95 }
            ]
        };

        // Sample results data for different class levels
        const classResultsDatabase = {
            "primary_5_A_Term 2": {
                average: 85.5,
                gpa: 3.72,
                rank: "8/30",
                subjectCount: 6,
                subjects: [
                    { subject: "Mathematics", code: "MATH-P5", continuous: 38, examination: 55, total: 93, grade: "A", remarks: "Excellent numerical skills" },
                    { subject: "English Language", code: "ENG-P5", continuous: 35, examination: 50, total: 85, grade: "B+", remarks: "Good reading skills" },
                    { subject: "Basic Science", code: "SCI-P5", continuous: 36, examination: 52, total: 88, grade: "A", remarks: "Very curious learner" },
                    { subject: "Social Studies", code: "SOC-P5", continuous: 34, examination: 48, total: 82, grade: "B", remarks: "Good participation" },
                    { subject: "Creative Arts", code: "ART-P5", continuous: 39, examination: 56, total: 95, grade: "A", remarks: "Excellent creativity" },
                    { subject: "Physical Education", code: "PE-P5", continuous: 37, examination: 53, total: 90, grade: "A", remarks: "Very active" }
                ],
                performance: [
                    { subject: "Math", score: 93 },
                    { subject: "English", score: 85 },
                    { subject: "Science", score: 88 },
                    { subject: "Social", score: 82 },
                    { subject: "Arts", score: 95 },
                    { subject: "PE", score: 90 }
                ]
            },
            "senior_SSS 2_Science A_Term 2": {
                average: 88.3,
                gpa: 3.88,
                rank: "5/35",
                subjectCount: 6,
                subjects: [
                    { subject: "Mathematics", code: "MATH-S2", continuous: 36, examination: 56, total: 92, grade: "A", remarks: "Excellent performance" },
                    { subject: "Physics", code: "PHY-S2", continuous: 34, examination: 52, total: 86, grade: "B+", remarks: "Very good understanding" },
                    { subject: "Chemistry", code: "CHEM-S2", continuous: 35, examination: 53, total: 88, grade: "A", remarks: "Good practical skills" },
                    { subject: "Biology", code: "BIO-S2", continuous: 37, examination: 54, total: 91, grade: "A", remarks: "Excellent in theory" },
                    { subject: "English Language", code: "ENG-S2", continuous: 33, examination: 49, total: 82, grade: "B", remarks: "Improve writing skills" },
                    { subject: "Computer Science", code: "CS-S2", continuous: 38, examination: 57, total: 95, grade: "A", remarks: "Outstanding programming" }
                ],
                performance: [
                    { subject: "Math", score: 92 },
                    { subject: "Physics", score: 86 },
                    { subject: "Chemistry", score: 88 },
                    { subject: "Biology", score: 91 },
                    { subject: "English", score: 82 },
                    { subject: "Computer", score: 95 }
                ]
            }
        };

        // DOM Elements
        const classLevelSelect = document.getElementById('classLevel');
        const classNameSelect = document.getElementById('className');
        const sectionSelect = document.getElementById('section');
        const termSelect = document.getElementById('term');
        const viewResultsBtn = document.getElementById('viewResultsBtn');
        const classSelection = document.getElementById('classSelection');
        const currentClassInfo = document.getElementById('currentClassInfo');
        const currentClassDetail = document.getElementById('currentClassDetail');
        const resultsTable = document.getElementById('resultsTable');
        const currentAverage = document.getElementById('currentAverage');
        const currentTerm = document.getElementById('currentTerm');
        const graphCanvas = document.getElementById('graphCanvas');
        const xAxis = document.getElementById('xAxis');
        const toggleButtons = document.querySelectorAll('.toggle-btn');
        
        // Current view mode and data
        let currentViewMode = 'default';
        let currentResultsData = defaultStudentData;
        
        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            setupToggleButtons();
            setupFormLogic();
            setupSidebar();
            loadDefaultResults();
            drawLineGraph();
        });
        
        // Setup toggle buttons
        function setupToggleButtons() {
            toggleButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const mode = this.getAttribute('data-mode');
                    
                    // Update active button
                    toggleButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');
                    
                    // Update view mode
                    currentViewMode = mode;
                    
                    if (mode === 'class') {
                        classSelection.classList.add('active');
                        currentClassInfo.style.display = 'flex';
                    } else {
                        classSelection.classList.remove('active');
                        currentClassInfo.style.display = 'flex';
                        loadDefaultResults();
                    }
                });
            });
        }
        
        // Setup form logic for class selection
        function setupFormLogic() {
            // Class Level Change
            classLevelSelect.addEventListener('change', function() {
                const level = this.value;
                
                if (level) {
                    // Enable class select and populate
                    classNameSelect.disabled = false;
                    populateClasses(level);
                    
                    // Reset other selects
                    sectionSelect.disabled = true;
                    sectionSelect.innerHTML = '<option value="">-- Select Class First --</option>';
                    
                    termSelect.disabled = true;
                    termSelect.innerHTML = '<option value="">-- Select Section First --</option>';
                    
                    viewResultsBtn.disabled = true;
                } else {
                    // Reset everything
                    classNameSelect.disabled = true;
                    classNameSelect.innerHTML = '<option value="">-- Select Class Level First --</option>';
                    
                    sectionSelect.disabled = true;
                    sectionSelect.innerHTML = '<option value="">-- Select Class First --</option>';
                    
                    termSelect.disabled = true;
                    termSelect.innerHTML = '<option value="">-- Select Section First --</option>';
                    
                    viewResultsBtn.disabled = true;
                }
            });
            
            // Class Name Change
            classNameSelect.addEventListener('change', function() {
                const level = classLevelSelect.value;
                const className = this.value;
                
                if (className) {
                    // Enable section select and populate
                    sectionSelect.disabled = false;
                    populateSections(level, className);
                    
                    // Reset term select
                    termSelect.disabled = true;
                    termSelect.innerHTML = '<option value="">-- Select Section First --</option>';
                    
                    viewResultsBtn.disabled = true;
                } else {
                    sectionSelect.disabled = true;
                    sectionSelect.innerHTML = '<option value="">-- Select Class First --</option>';
                    
                    termSelect.disabled = true;
                    termSelect.innerHTML = '<option value="">-- Select Section First --</option>';
                    
                    viewResultsBtn.disabled = true;
                }
            });
            
            // Section Change
            sectionSelect.addEventListener('change', function() {
                const level = classLevelSelect.value;
                const className = classNameSelect.value;
                const section = this.value;
                
                if (section) {
                    // Enable term select and populate
                    termSelect.disabled = false;
                    populateTerms(level, className, section);
                    
                    viewResultsBtn.disabled = true;
                } else {
                    termSelect.disabled = true;
                    termSelect.innerHTML = '<option value="">-- Select Section First --</option>';
                    
                    viewResultsBtn.disabled = true;
                }
            });
            
            // Term Change
            termSelect.addEventListener('change', function() {
                if (this.value) {
                    viewResultsBtn.disabled = false;
                } else {
                    viewResultsBtn.disabled = true;
                }
            });
        }
        
        // Populate classes based on level
        function populateClasses(level) {
            const classes = classData[level].classes;
            classNameSelect.innerHTML = '<option value="">-- Select Class --</option>';
            
            classes.forEach(cls => {
                const option = document.createElement('option');
                option.value = cls.name;
                option.textContent = cls.name;
                classNameSelect.appendChild(option);
            });
        }
        
        // Populate sections based on class
        function populateSections(level, className) {
            const classes = classData[level].classes;
            const selectedClass = classes.find(cls => cls.name === className);
            
            sectionSelect.innerHTML = '<option value="">-- Select Section --</option>';
            
            selectedClass.sections.forEach(section => {
                const option = document.createElement('option');
                option.value = section;
                option.textContent = section;
                sectionSelect.appendChild(option);
            });
        }
        
        // Populate terms based on section
        function populateTerms(level, className, section) {
            const classes = classData[level].classes;
            const selectedClass = classes.find(cls => cls.name === className);
            
            termSelect.innerHTML = '<option value="">-- Select Term --</option>';
            
            selectedClass.terms.forEach(term => {
                const option = document.createElement('option');
                option.value = term;
                option.textContent = term;
                termSelect.appendChild(option);
            });
        }
        
        // Load default student results
        function loadDefaultResults() {
            currentResultsData = defaultStudentData;
            
            // Update UI with default data
            updateResultsDisplay();
            currentClassDetail.textContent = "Grade 10A - Term 2 (Default)";
        }
        
        // Load class results
        function loadClassResults() {
            const level = classLevelSelect.value;
            const className = classNameSelect.value;
            const section = sectionSelect.value;
            const term = termSelect.value;
            
            // Create key for results database
            const key = `${level}_${className}_${section}_${term}`.replace(/\s+/g, ' ');
            
            // Get results from database
            const resultData = classResultsDatabase[key];
            
            if (resultData) {
                currentResultsData = resultData;
                updateResultsDisplay();
                
                // Update class info
                currentClassDetail.textContent = `${className} ${section} - ${term}`;
                showNotification(`Results loaded for ${className} ${section} - ${term}`);
            } else {
                showNotification("No results found for the selected class. Showing default results instead.");
                loadDefaultResults();
            }
        }
        
        // Update results display with current data
        function updateResultsDisplay() {
            // Update average
            currentAverage.textContent = `${currentResultsData.average}%`;
            currentTerm.textContent = `${currentResultsData.term} - 2023/2024 Academic Year`;
            
            // Update overview cards
            document.querySelector('.overview-card:nth-child(1) .overview-value').textContent = currentResultsData.gpa;
            document.querySelector('.overview-card:nth-child(2) .overview-value').textContent = `${currentResultsData.average}%`;
            document.querySelector('.overview-card:nth-child(3) .overview-value').textContent = currentResultsData.rank;
            document.querySelector('.overview-card:nth-child(4) .overview-value').textContent = currentResultsData.subjectCount;
            
            // Load results table
            loadResultsTable(currentResultsData.subjects);
            
            // Draw line graph
            drawLineGraph();
        }
        
        // Load results table
        function loadResultsTable(subjects) {
            resultsTable.innerHTML = '';
            
            subjects.forEach(subject => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td><strong>${subject.subject}</strong></td>
                    <td>${subject.code}</td>
                    <td>${subject.continuous}/40</td>
                    <td>${subject.examination}/60</td>
                    <td><strong>${subject.total}/100</strong></td>
                    <td><span class="grade-badge grade-${subject.grade.replace('+', '').replace('-', '')}">${subject.grade}</span></td>
                    <td>${subject.remarks}</td>
                `;
                resultsTable.appendChild(row);
            });
        }
        
        // Draw line graph
        function drawLineGraph() {
            const performanceData = currentResultsData.performance;
            const scores = performanceData.map(item => item.score);
            const subjects = performanceData.map(item => item.subject);
            
            // Calculate average for the line
            const average = scores.reduce((sum, score) => sum + score, 0) / scores.length;
            const highest = Math.max(...scores);
            const lowest = Math.min(...scores);
            const range = highest - lowest;
            
            // Update stats
            document.querySelector('.stat-item:nth-child(1) .stat-value').textContent = `${average.toFixed(1)}%`;
            document.querySelector('.stat-item:nth-child(2) .stat-value').textContent = `${highest}%`;
            document.querySelector('.stat-item:nth-child(3) .stat-value').textContent = `${lowest}%`;
            document.querySelector('.stat-item:nth-child(4) .stat-value').textContent = `${range}%`;
            
            // Clear existing graph
            graphCanvas.innerHTML = '';
            xAxis.innerHTML = '';
            
            // Get graph dimensions
            const graphWidth = graphCanvas.offsetWidth;
            const graphHeight = graphCanvas.offsetHeight;
            
            // Create SVG element
            const svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
            svg.setAttribute("width", "100%");
            svg.setAttribute("height", "100%");
            svg.setAttribute("viewBox", `0 0 ${graphWidth} ${graphHeight}`);
            svg.style.position = "absolute";
            svg.style.top = "0";
            svg.style.left = "0";
            
            // Calculate positions for data points
            const pointPositions = [];
            const pointRadius = 6;
            const padding = 20;
            
            for (let i = 0; i < scores.length; i++) {
                const x = padding + (i * (graphWidth - 2 * padding) / (scores.length - 1));
                const y = graphHeight - padding - ((scores[i] - 60) * (graphHeight - 2 * padding) / 40);
                pointPositions.push({ x, y, score: scores[i], subject: subjects[i] });
            }
            
            // Create line path
            let pathData = `M ${pointPositions[0].x} ${pointPositions[0].y}`;
            for (let i = 1; i < pointPositions.length; i++) {
                pathData += ` L ${pointPositions[i].x} ${pointPositions[i].y}`;
            }
            
            // Create area path
            let areaData = `M ${pointPositions[0].x} ${pointPositions[0].y}`;
            for (let i = 1; i < pointPositions.length; i++) {
                areaData += ` L ${pointPositions[i].x} ${pointPositions[i].y}`;
            }
            areaData += ` L ${pointPositions[pointPositions.length - 1].x} ${graphHeight - padding}`;
            areaData += ` L ${pointPositions[0].x} ${graphHeight - padding} Z`;
            
            // Add area to SVG
            const areaPath = document.createElementNS("http://www.w3.org/2000/svg", "path");
            areaPath.setAttribute("d", areaData);
            areaPath.setAttribute("class", "performance-area");
            svg.appendChild(areaPath);
            
            // Add line to SVG
            const linePath = document.createElementNS("http://www.w3.org/2000/svg", "path");
            linePath.setAttribute("d", pathData);
            linePath.setAttribute("class", "performance-line");
            linePath.style.strokeDasharray = "1000";
            linePath.style.strokeDashoffset = "1000";
            svg.appendChild(linePath);
            
            graphCanvas.appendChild(svg);
            
            // Create data points
            pointPositions.forEach((point, index) => {
                const dataPoint = document.createElement('div');
                dataPoint.className = 'data-point';
                dataPoint.style.left = `${point.x}px`;
                dataPoint.style.top = `${point.y}px`;
                dataPoint.setAttribute('data-score', point.score);
                dataPoint.setAttribute('data-subject', point.subject);
                dataPoint.setAttribute('data-index', index);
                
                // Create tooltip
                const tooltip = document.createElement('div');
                tooltip.className = 'data-tooltip';
                tooltip.textContent = `${point.subject}: ${point.score}%`;
                dataPoint.appendChild(tooltip);
                
                // Add hover events
                dataPoint.addEventListener('mouseenter', function() {
                    this.classList.add('highlight');
                    const tooltip = this.querySelector('.data-tooltip');
                    tooltip.style.opacity = '1';
                    tooltip.style.transform = 'translate(-50%, -120%)';
                });
                
                dataPoint.addEventListener('mouseleave', function() {
                    this.classList.remove('highlight');
                    const tooltip = this.querySelector('.data-tooltip');
                    tooltip.style.opacity = '0';
                    tooltip.style.transform = 'translate(-50%, -100%)';
                });
                
                graphCanvas.appendChild(dataPoint);
                
                // Add x-axis label
                const xLabel = document.createElement('div');
                xLabel.className = 'x-label';
                xLabel.textContent = point.subject;
                xLabel.style.left = `${point.x}px`;
                xAxis.appendChild(xLabel);
            });
            
            // Update average line
            const averageLine = document.querySelector('.average-line');
            const averageLabel = document.querySelector('.average-label');
            if (averageLine) {
                const averageY = graphHeight - padding - ((average - 60) * (graphHeight - 2 * padding) / 40);
                averageLine.style.bottom = `${graphHeight - averageY}px`;
                averageLabel.textContent = `Average: ${average.toFixed(1)}%`;
            }
            
            // Animate line drawing
            setTimeout(() => {
                linePath.style.transition = "stroke-dashoffset 2s ease-in-out";
                linePath.style.strokeDashoffset = "0";
                
                // Animate data points
                const dataPoints = document.querySelectorAll('.data-point');
                dataPoints.forEach((point, index) => {
                    point.style.animation = `fadeInPoints 0.5s ease ${index * 0.2}s forwards`;
                    point.style.opacity = '0';
                });
            }, 500);
        }
        
        // Download PDF
        function downloadResultPDF() {
            const button = event.target.closest('button');
            const originalText = button.innerHTML;
            button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Generating PDF...';
            button.disabled = true;
            
            setTimeout(() => {
                const fileName = currentViewMode === 'default' 
                    ? `My_Results_Term2_${new Date().getFullYear()}.pdf`
                    : `Class_Results_${currentClassDetail.textContent.replace(/[^a-zA-Z0-9]/g, '_')}_${new Date().getFullYear()}.pdf`;
                
                const link = document.createElement('a');
                link.href = '#';
                link.download = fileName;
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
                
                showNotification('PDF downloaded successfully!');
                
                button.innerHTML = originalText;
                button.disabled = false;
            }, 2000);
        }
        
        // Download Excel
        function downloadResultExcel() {
            const button = event.target.closest('button');
            const originalText = button.innerHTML;
            button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Generating Excel...';
            button.disabled = true;
            
            setTimeout(() => {
                const fileName = currentViewMode === 'default'
                    ? `My_Results_Detailed_${new Date().getFullYear()}.xlsx`
                    : `Class_Results_Detailed_${currentClassDetail.textContent.replace(/[^a-zA-Z0-9]/g, '_')}_${new Date().getFullYear()}.xlsx`;
                
                const link = document.createElement('a');
                link.href = '#';
                link.download = fileName;
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
                
                showNotification('Excel file downloaded successfully!');
                
                button.innerHTML = originalText;
                button.disabled = false;
            }, 2000);
        }
        
        // Print report card
        function printReportCard() {
            alert(`Opening print preview for ${currentViewMode === 'default' ? 'your report card' : 'class results'}...`);
        }
        
        // Request correction
        function requestCorrection() {
            const subject = prompt('Enter subject name requiring correction:');
            if (subject) {
                const issue = prompt('Describe the issue or correction needed:');
                if (issue) {
                    showNotification(`Correction request submitted for ${subject}.`);
                }
            }
        }
        
        // Share results
        function shareResults() {
            const email = prompt('Enter parent/guardian email address:');
            if (email) {
                showNotification(`Results shared with ${email}.`);
            }
        }
        
        // View history
        function viewHistory() {
            alert('Opening result history...');
        }
        
        // View detailed analysis
        function viewDetailedAnalysis() {
            alert(`Opening detailed analysis for ${currentViewMode === 'default' ? 'your results' : 'class results'}...`);
        }
        
        // Show notification
        function showNotification(message) {
            const notification = document.createElement('div');
            notification.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                background: var(--navy-blue);
                color: white;
                padding: 15px 20px;
                border-radius: 8px;
                box-shadow: 0 4px 12px rgba(0,0,0,0.15);
                z-index: 10000;
                font-weight: 500;
                animation: slideIn 0.3s ease;
            `;
            
            notification.textContent = message;
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.style.animation = 'slideOut 0.3s ease';
                setTimeout(() => {
                    document.body.removeChild(notification);
                }, 300);
            }, 3000);
            
            if (!document.querySelector('#notification-styles')) {
                const style = document.createElement('style');
                style.id = 'notification-styles';
                style.textContent = `
                    @keyframes slideIn {
                        from { transform: translateX(100%); opacity: 0; }
                        to { transform: translateX(0); opacity: 1; }
                    }
                    @keyframes slideOut {
                        from { transform: translateX(0); opacity: 1; }
                        to { transform: translateX(100%); opacity: 0; }
                    }
                `;
                document.head.appendChild(style);
            }
        }
        
        // Setup sidebar functionality
        function setupSidebar() {
            document.getElementById('sidebarCollapse').addEventListener('click', function() {
                document.getElementById('sidebar').classList.toggle('active');
            });
            
            document.querySelectorAll('.nav-link').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    document.querySelectorAll('.nav-link').forEach(item => {
                        item.classList.remove('active');
                    });
                    this.classList.add('active');
                    
                    if (window.innerWidth < 992) {
                        document.getElementById('sidebar').classList.remove('active');
                    }
                });
            });
            
            document.addEventListener('click', function(event) {
                const sidebar = document.getElementById('sidebar');
                const sidebarCollapse = document.getElementById('sidebarCollapse');
                
                if (window.innerWidth < 992 && 
                    !sidebar.contains(event.target) && 
                    !sidebarCollapse.contains(event.target) &&
                    sidebar.classList.contains('active')) {
                    sidebar.classList.remove('active');
                }
            });
        }
        
        // Redraw graph on window resize
        let resizeTimer;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(drawLineGraph, 250);
        });
    </script>
</body>

</html>