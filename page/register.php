<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/login_register.css">
</head>

<body>
    <h1 class="header">HospiLite - Hospital Management System</h1>
    <div class="reg-body">
        <div class="reg-container">
            <h1 class="header">Registration Form</h1>
            <form action="#" class="form">
                <div class="input-box">
                    <label for="fullName">Full Name</label>
                    <input id="fullName" type="text" placeholder="Enter Full Name" pattern="[a-zA-Z]+" required>
                </div>
                <div class="input-box">
                    <label for="eMail">Email Address</label>
                    <input id="eMail" type="email" placeholder="Enter Email Address" required>
                </div>
                <div class="column">
                    <div class="input-box">
                        <label for="phoneNo">Phone Number</label>
                        <input id="phoneNo" type="tel" placeholder="Enter Phone No." pattern="[0-9]{10}" required>
                    </div>
                    <div class="input-box">
                        <label for="birthDate">Birth Date</label>
                        <input id="birthDate" type="date" placeholder="Enter Birth Date" required>
                    </div>
                </div>
                <div class="gender-container">
                    <h3>Gender</h3>
                    <div class="gender-option">
                        <div class="gender">
                            <input type="radio" id="check-male" name="gender" />
                            <label for="check-male">Male</label>
                        </div>
                        <div class="gender">
                            <input type="radio" id="check-female" name="gender" />
                            <label for="check-female">female</label>
                        </div>
                        <div class="gender">
                            <input type="radio" id="check-na" name="gender" checked />
                            <label for="check-na">Prefer not to say</label>
                        </div>
                    </div>
                </div>
                <!-- <div class="input-box address">
                    <label for="address">Address</label>
                    <input id="address" type="text" placeholder="Enter Address Line 1" required>
                    <input type="text" placeholder="Enter Address Line 2">
                    <div class="column">
                        <div class="select-container">
                            <select name="" id="">
                                <option value="" hidden>Country</option>
                                <option value="">America</option>
                                <option value="">Brazil</option>
                                <option value="">Colombo</option>
                                <option value="">India</option>
                            </select>
                        </div>
                        <input type="text" placeholder="Enter City" required>
                    </div>
                    <div class="column">
                        <input type="text" placeholder="Enter Region" required>
                        <input type="number" placeholder="Enter postal code" required>
                    </div>
                </div> -->
                <div class="input-box">
                    <label for="pass">Password</label>
                    <input id="pass" type="password" placeholder="Enter Password" pattern=".{6,}" required>
                </div>
                <div class="input-box">
                    <label for="con_pass">Confirm Password</label>
                    <input id="con_pass" type="password" placeholder="Confirm Password" required>
                </div>
                <button class="submit-btn">Submit</button>
            </form>
        </div>
    </div>
    </div>
</body>

</html>
