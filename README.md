Sign Up with roles (admin,employee,manager)
1. Admin: 
	a. create users(first_name, last_name,email,password,role)
	b. login=>redirect on dashboard  Dahboard | Tasks | Users
	b. display all users list with CRUD
	c. Create Task(title,description,due date, status)
	d. List Tasks with CRUD

2. Manager
	a. login=>redirect on dashboad and display links :Dahboard | Tasks
	b. All Tasks list with Action: Assign Task
	c. Assign Task page: Choose Employee Name & assign.
3. Employee
	a. Display all 	Assigned task list
	b. Update task status



4 Run Project
    php artisan serve
    database: laravelTaskManagment

5. Local Url
	http://127.0.0.1:8000/login	