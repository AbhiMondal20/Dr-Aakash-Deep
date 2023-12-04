-------->>                                    <<--------
-------->>     Appointment Booking System     <<--------
-------->>                                    <<--------

-- Single Login Page
        --- Admin
        --- Doctor
        --- User


1. Admin
    -- Dashboard
        -- Total Patient
        -- Today's Patient
        -- Today's Visit
        -- Today's Pending
        -- NEW PATIENT LIST
    -- Appointment
       -- Doctor Schedule
           -- Add new Schedule with Modal popup 
           -- Calender View Schedule
           -- Schedule List with Edit Button
               -- Edit / Update Schedule Time
    -- Doctors
        -- All Doctors
            -- Doctors Detailes Entry button with Modal poopup
            -- All Doctor List AS card style
            -- With Edit or Update Icon
                -- Update Doctor Detailes
            -- View Profile Button
                -- View Doctor Full Profile (Name, Department, Education, Images, About, email, Mobile )
                -- Doctor Blog Post
                -- Update Password
                -- Account Settings
    -- Patients
        -- All Patients
                -- Add New Patient button with modal popup 
                    {     
                            using Dependency Dropdown 
                            Department -> Doctor -> Date -> Time
                    }
                -- All Patient List AS Card Style
                -- With Edit or Update Icons
                    -- Update Patient Detaile (pending)
        -- Paient Invoice (Pending)

    -- Add User
        -- Add New User Button with Modal popup
        -- All User List As card style
            -- With Active/Deactive Button
        -- Edit or update icons (Update User Page)


    -- Profile Page (Pending)

 2. Doctor
     -- Dashboard
         -- Total Patient
         -- Today's Patient
         -- Today's Visit
         -- Today's Pending
         --NEW PATIENT LIST
     -- Appointment 
          -- Schedule
                -- Add new Schedule with Modal popup 
                -- Calender View Schedule
                -- Schedule List with Edit Button
                -- Edit / Update Schedule Time
          -- BOOKED SCHEDULE LIST ( Show Today Only With a View Button )
          -- View All
              -- BOOKED SCHEDULE ( All boocked Schedule -- With a View Button )
     -- Patients
         -- All Patients
           -- All patient List As Card Style
         -- Patient Invoice (pending)

     -- Profile Page
          -- View Doctor Full Profile (Name, Department, Education, Images, About, email, Mobile )
          -- Doctor Blog Post
          -- Update Password
          -- Account Settings

3. User (Pending)


Last Updat Date 20-07-2023 
  Alpha July 20 Version