@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <title>C/GPA Calculator</title>
</head>

<!-- PAGE CONTENT -->
<div class="container">
    <body>
        <div>
            <!-- Nav Bar -->
            <div class="nav-bar">
                <ul class="tabs">
                    <li data-tab-target="#calculator" class="tab home active" style="margin-right:auto;"><i
                            class="fas fa-calculator"></i> C/GPA CALCULATOR </li>
                    <li data-tab-target="#settings" class="tab" style="display: flex; align-items: center;"><i
                            class="fas fa-cog"></i>
                        <div class="nav-bar-label">&nbsp;Settings</div>
                    </li>
                    <li data-tab-target="#info" class="tab" style="display: flex; align-items: center;"><i
                            class="fas fa-info-circle"></i>
                        <div class="nav-bar-label">&nbsp;Info</div>
                    </li>
                </ul>
            </div>
    
            <div class="tab-content">
                <!-- Calculator -->
                <div id="calculator" class="active" data-tab-content>
                    <div class="calculator">
                        <form>
                            <div class="cgpaInput-box">
                                <div class="cgpaInput">Current CGPA : <input type="number" class="currentCGPA"
                                        placeholder="E.g. 3.12" step="0.5"></div>
                                <div class="cgpaInput">Credits Completed : <input type="number" class="creditsCompleted"
                                        placeholder="E.g. 45" step="1"></div>
                            </div>
    
                            <table class="calculator-table">
                                <thead>
                                    <tr>
                                        <th>COURSE</th>
                                        <th>CREDIT<span style="color:red">*</span></th>
                                        <th>GRADE<span style="color:red">*</span></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <button type="button" class="addSubject-btn"><i class="fas fa-plus"></i></button><br>
                            <div class="gpa-target">
                                <div class="gpaTargetInput-box">
                                    <div class="gpaTargetInput">Credits currently taking : <input type="number"
                                            class="creditsTaking" placeholder="E.g. 17" step="1"></div>
                                    <div class="gpaTargetInput">I want to raise my CGPA to : <input type="number"
                                            class="cgpaTarget" placeholder="E.g. 3.31" step="0.5"></div>
                                </div>
                                <div class="gpaTargetLabel">I need to get a gpa of:<div class="gpaTargetValue">0</div>
                                </div>
                            </div>
                        </form>
                    </div>
    
                    <div class="result row">
                        <div class="col-md-5">
                            <div class="display-label semesterCreditDisplay-box">Semester Credits: <div
                                    id="semesterCreditDisplay" class="display-value">0</div>
                            </div>
                            <div class="display-label gpaDisplay-box">GPA:<div id="gpaDisplay" class="display-value">0</div>
                            </div>
                        </div>
    
                        <div class="col-md-5">
                            <div class="display-label">Total Credits: <div id="totalCreditDisplay" class="display-value">0
                                </div>
                            </div>
                            <div class="display-label">CGPA: <div id="cgpaDisplay" class="display-value">0</div>
                            </div>
                        </div>
                    </div>
                </div>
    
                <!-- Settings -->
                <div id="settings" data-tab-content>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="configureSettings">
                                <div class="currentSettings">
                                    <div><div class="currentSettingsText">Current Settings :</div><div id="settingsName">DEFAULT</div></div> <div id="toggleShowSettings"><i onclick="toggleSettingsList(this)"class="fas fa-chevron-down"></i></div>
                                </div>
                                <div class="settingsList">
                                    <ul class="preSetTabs">
                                        <li id="default" class="preSetTab active">DEFAULT</li>
                                        <li id="custom" class="preSetTab">CUSTOM</li>
                                    </ul>
                                    <div class="preSetSettingsHead">
                                        ----Preset Settings----
                                    </div>
                                    <ul class="preSetTabs scrollable">
                                        <li id="help" class="preSetTab">HELP</li>
                                        <li id="inti" class="preSetTab">INTI</li>
                                        <li id="sunway" class="preSetTab">SUNWAY</li>
                                        <li id="stpm" class="preSetTab">STPM</li>
                                        <li id="taruc" class="preSetTab">TARUC</li>
                                        <li id="taylors" class="preSetTab">TAYLOR'S</li>
                                        <li id="ucsi" class="preSetTab">UCSI</li>
                                        <li id="upm" class="preSetTab">UPM</li>
                                        <li id="usm" class="preSetTab">USM</li>
                                        <li id="utar" class="preSetTab">UTAR</li>
                                        <li id="utm" class="preSetTab">UTM</li>
                                    </ul>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-md-9">
                            <form>
                                <table class="settings-table">
                                    <thead>
                                        <tr>
                                            <th>ENABLE</th>
                                            <th>GRADE</th>
                                            <th>POINTS</th>
                                        </tr>
                                    </thead>
                                    <tbody class="settings-table-body">
                                        <tr>
                                            <td><input type="checkbox" checked></td>
                                            <td>A+</td>
                                            <td><input type="number" value=4.30 step="0.25"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" checked></td>
                                            <td>A</td>
                                            <td><input type="number" value=4.00 step="0.25"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" checked></td>
                                            <td>A-</td>
                                            <td><input type="number" value=3.70 step="0.25"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" checked></td>
                                            <td>B+</td>
                                            <td><input type="number" value=3.30 step="0.25"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" checked></td>
                                            <td>B</td>
                                            <td><input type="number" value=3.00 step="0.25"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" checked></td>
                                            <td>B-</td>
                                            <td><input type="number" value=2.70 step="0.25"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" checked></td>
                                            <td>C+</td>
                                            <td><input type="number" value=2.60 step="0.25"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" checked></td>
                                            <td>C</td>
                                            <td><input type="number" value=2.00 step="0.25"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" checked></td>
                                            <td>C-</td>
                                            <td><input type="number" value=1.70 step="0.25"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" checked></td>
                                            <td>D+</td>
                                            <td><input type="number" value=1.30 step="0.25"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" checked></td>
                                            <td>D</td>
                                            <td><input type="number" value=1.00 step="0.25"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" checked></td>
                                            <td>D-</td>
                                            <td><input type="number" value=0.70 step="0.25"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" checked></td>
                                            <td>F</td>
                                            <td><input type="number" value=0.00 step="0.25"></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3"><button type="button" class="saveSettings-btn">Save</button></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </form>
                        </div>
                    </div>
                    
                    
                </div>
    
                <!-- Info -->
                <div id="info" data-tab-content>
                    <div class="info-content">
                        <h1>What is GPA and CGPA?</h1>
                        <p>
                            <strong>Grade Point Average (GPA)</strong> is a number that indicates you score on an average. A
                            grade point can be a number or a letter. For example, if your grade is A it usually stands for a
                            number, the standard grade scale is 4.00. So if you get an A your GPA would be 4 and if you get
                            a B then the grade point goes to 3 and the scale keeps shifting according to the grading system.
                            There are different ways of estimating your grade point depending on what country are you in and
                            what institution you are enrolled in.<br><br>
                            <strong>Cumulative Grade Point Average (CGPA)</strong> is usually used to measure the overall
                            academic performance of a student. CGPA is calculated by obtaining the mean of the GPA that a
                            student is awarded in every semester and is divided by the total number of credits.
                        </p>
                        <h1>How to calculate GPA and CGPA?</h1>
                        <strong>Quality Points</strong> = Grade Point x Credit of the course<br><br>
                        <div class="formula">
                            <div><strong>GPA</strong> &nbsp; = &nbsp;</div>
                            <table style="text-align: center;">
                                <tr>
                                    <td style="border-bottom:1px solid black">Total Quality Points for a semester</td>
                                </tr>
                                <tr>
                                    <td>Total Credits in a semester</td>
                                </tr>
                            </table>
                        </div>
                        <br>
                        <div class="formula">
                            <div><strong>CGPA</strong> = &nbsp;</div>
                            <div>
                                <table style="text-align: center;">
                                    <tr>
                                        <td style="border-bottom:1px solid black">Total Quality Points for all semesters
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Total Credits in all semesters</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
    
                </div>
            </div>
    
        </div>
        
    </body>
    
    </html>
      
    @endsection
    
    
</div>
