# opc.js

opc.js is a library that allows you to get and write data to an OPC Server using a RESTful API.
This project can be used particularly if you want to create a smooth user interface for your industrial API.

## Getting Started

The following instructions will allow you to configure your opc server so that you can read and write data. It uses the IoT functionnality of the KepserverEx OPC server, which is a RESTFul server.

### Prerequisites

What you'll need:

* **Jquery** 
* **KepServerEx** with the IoT option
* **Basic knowledge** in industrial automation and web development.
* ** [Jquery-toast-plugin]** (https://github.com/kamranahmedse/jquery-toast-plugin)


```
<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
```
OR
```
<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
```


# Installing

## Create your user interface 
Create the buttons and other objects that will allow you to show variables through the web interface.
You can use website builders such as wordpress, wix, google sites...

## Linking opc variable and the interface

To link the variables, opc.js uses a RESTful client to communicate with the opc server.

## Setting the data types of your variables

You can read multiple types of variable types with this library.
You should always specify the type of variable you want to write or read so that opc.js can react accordingly.

### opc.js general classes:
```
* **opcVar** *required*: general opc variable. It will automaticaly update its state after reading the value from the OPC server.
* **opcWrite** *optional*: Works as the previous one, but will also write the value if the user changes it.
```

### opc.js variable classes:


* **opcButton**: 
	* on write: will write True of False in the variable;
	* on read: will toggle the "active" state of the button (usually pressed or not pressed);
		```
		<button type="button" id="myOpcBooleanVar" class="btn btn-info opcVar opcButton opc Write">Something</button>
		```

* **opcSwitch**: 
It is typically used for checkboxes displayed as switches.
Functions just as the button, but the *checked* property is added or removed instead of *active*
	* on write: will write True of False in the variable;
	* on read: will toggle the "checked" state of the switch;
		```
		<button type="button" id="myOpcBooleanVar" class="btn btn-info opcVar opcButton opc Write">Something</button>
		```

* **opcText** :
opcText uses the html() function of Jquery. Therefore you can use it to display a value in a table for example.
	* on write : must be inserted in an input --> to be done
	* on read : it will display the value read in the server.

		```
		<table>
		  <tr>
		    <th>Parametre</th>
		    <th>Valeur</th> 
		  </tr>
		  <tr>
		    <td>Jill</td>
		    <td class= "opcVar opcText " id="myOpcTextVar"></td> 
		  </tr>
		 </table>
		```



## Authors

* **Luc LE BARZ** - *Initial work* - [Symea.fr](https://Symea.fr)
* **Antoine LEBOISSETIER** - *Automation*

See also the list of [contributors](https://github.com/Luclb/opc.js/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

* Thanks to ICAM, site de Bretagne, who allowed us to build this project.
* Jean Jacque LE PAPE, responsable du projet,
* David FASANI, tuteur du projet informatique,
* Damien DREAN, tuteur du projet automatisme;

