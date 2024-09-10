import sys
import pandas as pd
import numpy as np
from sklearn.linear_model import LogisticRegression
from sklearn.model_selection import train_test_split
from sklearn.preprocessing import StandardScaler

def preprocess_data(df):
    # Encode categorical variables
    df['Gender'] = df['Gender'].map({'Male': 1, 'Female': 0})
    stream_mapping = {
        'Electronics And Communication': 0,
        'Computer Science': 1,
        'Mechanical': 2,
        'Civil': 3,
        'Information Technology': 4,
        'Electrical': 5
    }
    df['Stream'] = df['Stream'].map(stream_mapping)
    return df, stream_mapping

def get_user_data():
    try:
        # Read the input parameters from command line arguments
        age = int(sys.argv[1])
        gender = sys.argv[2]
        stream = sys.argv[3]
        internships = int(sys.argv[4])
        cgpa = float(sys.argv[5])
        hostel = sys.argv[6]
        backpapers = sys.argv[7]

        # Encode categorical variables
        gender = 1 if gender.lower() == 'male' else 0
        hostel = 1 if hostel.lower() == 'yes' else 0
        backpapers = 1 if backpapers.lower() == 'yes' else 0

        return age, gender, stream, internships, cgpa, hostel, backpapers
    except Exception as e:
        print(f"Error: {e}")
        sys.exit(1)

def main():
    # Load dataset
    df = pd.read_csv("dataset/collegePlace.csv")

    # Preprocess the data
    df, stream_mapping = preprocess_data(df)

    # Extract features and target
    X = df.drop('PlacedOrNot', axis=1)
    y = df['PlacedOrNot']

    # Split the data
    X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=1)

    # Scale the features
    scaler = StandardScaler()
    X_train_scaled = scaler.fit_transform(X_train)
    X_test_scaled = scaler.transform(X_test)

    # Train the model
    model = LogisticRegression()
    model.fit(X_train_scaled, y_train)

    # Get user data
    age, gender, stream, internships, cgpa, hostel, backpapers = get_user_data()

    # Encode the stream
    if stream in stream_mapping:
        stream = stream_mapping[stream]
    else:
        print(f"Error: Invalid stream '{stream}'")
        sys.exit(1)

    # Prepare the user data for prediction
    user_data = np.array([[age, gender, stream, internships, cgpa, hostel, backpapers]])
    user_data_scaled = scaler.transform(user_data)

    # Make the prediction
    prediction = model.predict(user_data_scaled)
    return "WILL GET PLACED" if prediction[0] == 1 else "MIGHT NOT GET PLACED"

if __name__ == "__main__":
    print(main())
