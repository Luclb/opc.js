# opc.js

opc.js is a library that allows you to get and write data to an OPC Server using a RESTful API.
This project can be used particularly if you want to create a smooth user interface for your industrial API.

## Getting Started

The following instructions will allow you to configure your opc server so that you can read and write data. It uses the IoT functionnality of the KepserverEx OPC server, which is a RESTFul server.

#### Prerequisites

What you'll need:

* [Jquery](https://jquery.com/) 

		
		<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>

		OR
		
		<script	src="https://code.jquery.com/jquery-3.2.1.js"integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
		
*  [jquery Toast](https://github.com/kamranahmedse/jquery-toast-plugin)

		
		<script type="text/javascript" src="js/jquery.toast.min.js"></script>
		

* [KepServerEx](https://www.kepware.com/en-us/products/kepserverex/) with the IoT option or any OPC server with a RESTful Server option

* **Basic knowledge** in industrial automation and web development.



# Installing

## Create your user interface 
Create the buttons and other objects that will allow you to show variables through the web interface.
You can use website builders such as wordpress, wix, google sites...

## Linking opc variable and the interface

To link the variables, opc.js uses a RESTful client to communicate with the opc server.

#### Setting the data types of your variables

You can read multiple types of variable types with this library.
You should always specify the type of variable you want to write or read so that opc.js can react accordingly.

#### opc.js general classes:

* **opcVar** *required*: general opc variable. It will automatically update its state after reading the value from the OPC server.
* **opcWrite** *optional*: Works as the previous one, but will also write the value if the user changes it.


#### opc.js variable classes:


* **opcButton**: 
	* *opcRead is required*
	* on write: will write True of False in the variable;
	* on read: will toggle the "active" state of the button (usually pressed or not pressed);
		```
		<button type="button" id="myOpcBooleanVar" class="btn btn-info opcRead opcVar opcButton opcWrite">Something</button>
		```

* **opcPushBtn**: 
* *opcRead is NOT  required*
Works just like a opcButton but once the user releases the button, it returns to the value 0. 
		```
		<button type="button" id="myOpcBooleanVar" class="btn btn-info  opcVar opcPushBtn opcWrite">Something</button>
		```

* **opcSwitch**: 
It is typically used for checkboxes displayed as switches.
Functions just as the button, but the *checked* property is added or removed instead of *active*
	* on write: will write True of False in the variable;
	* on read: will toggle the "checked" state of the switch;
		```
		<button type="button" id="myOpcBooleanVar" class="btn btn-info opcVar opcSwitch opc Write">Something</button>
		```

* **opcText** :
opcText uses the html() function of Jquery. Therefore you can use it to display a value in a table for example.
	* on write : must be inserted in an input --> to be done
	* on read : it will display the value read in the server.

		```
		<table>
		  <tr>
		    <th>Parameter</th>
		    <th>Value</th> 
		  </tr>
		  <tr>
		    <td>Jill</td>
		    <td class= "opcVar opcText " id="myOpcTextVar"></td> 
		  </tr>
		 </table>
		```


* **opcTextWrite**: 
If used in an <input>, it will update the value of the linked variable in the OPC Server.
```
<input id="myVar" class="opcWriteText varOPC opcText opcAdmin" max='15' min='0' type="number"  value="5">
```



# OPC Side
To allow the app to access the OPC Server, you must configure a couple of things.

You'll find here a list of the parameters that you need to check or change, as well as a [Youtube ](https://Symea.fr) video turorial.

## Linking the app and the OPC server

#### The database 
	* Import the db.sql file into your own database,
	* Configure your dbconfig.php file,
	
## OPC Server Configuration

As specified before, we used a KepWare solution which allows you to use an opc server freely for up to 2 hours continiuously.
In the docs section of my GitHub, there is a documentation that shows you how to configure the IotGateWay and an OPC Server

*Once configured correctly, the parameters should look like this.

![Server Configuration ](https://github.com/Luclb/opc.js/blob/master/docs/serverConfiguration.JPG)

## Authors

* **Luc LE BARZ** - *Initial work* - [Symea.fr](https://Symea.fr)
* **Antoine LEBOISSETIER** - *Automation*

See also the list of [contributors](https://github.com/Luclb/opc.js/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

* Thanks to ICAM, site de Bretagne, who allowed us to build this project.
* Jean Jacque LE PAPE, responsible of the project,
* David FASANI, web development tutor,
* Damien DREAN, automation tutor;
