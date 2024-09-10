## **HireVision - Placement Prediction Website**

HireVision is a web-based application designed to predict whether a student will be placed based on their inputs using Logistic Regression. Users can sign up, log in, and fill out forms to receive placement predictions. Admins have the capability to manage users and view the database.

### **Features**

- **User Authentication**: Users can log in or sign up to access the prediction features.
- **Prediction System**: Uses Logistic Regression to predict placement outcomes based on user inputs.
- **Admin Panel**: Admins can view the database, monitor users, and remove users if needed.

### **Tech Stack**

- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP
- **Machine Learning**: Python (Logistic Regression)
- **Database**: MySQL (Hosted on XAMPP)

### **Dataset**

The project uses the [Engineering Placements Prediction dataset](https://www.kaggle.com/datasets/tejashvi14/engineering-placements-prediction) from Kaggle.

### **Installation and Setup**

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/jaideepmanat/HireVision.git
   cd HireVision
   ```

2. **Set Up XAMPP**:
   - Download and install [XAMPP](https://www.apachefriends.org/index.html).
   - Move the cloned project folder into the `htdocs` directory of XAMPP.

3. **Import the Database**:
   - Start Apache and MySQL from the XAMPP control panel.
   - Open phpMyAdmin (`http://localhost/phpmyadmin`).
   - Create a new database with name`placementpred`.
   - Import the SQL file named (user_details.sql)[https://github.com/jaideepmanat/HireVision/blob/master/user_details.sql].

4. **Run the Application**:
   - Access the application via your browser at `http://localhost/placementpred`.

### **How It Works**

1. **User Side**:
   - Users can sign up or log in.
   - They fill out a form with required details.
   - The system uses Logistic Regression to predict their placement outcome.

2. **Admin Side**:
   - Admins can log in to access the admin panel.
   - Admins can view all registered users.
   - Admins have the ability to remove users from the database.

### **File Structure**

- **PHP Files**: Backend logic and API endpoints.
- **Python File**: Logistic Regression model for prediction.
- **JS & CSS Files**: Frontend interactions and styling.
- **Dataset (CSV)**: Used for training and testing the machine learning model.

### **Contributing**

Feel free to fork this repository and make improvements. Pull requests are welcome!

### **License**

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

### **Contact**

For any questions or suggestions, please reach out via GitHub Issues or contact me directly.

---
