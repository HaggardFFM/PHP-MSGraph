# PHP-MSGraph

After the shutdown of Basic Authentication for EWS, I searched for a new solution to communicate with the exchange server hosted by Microsoft (Exchange Online). 
The only solution which will be used for an application access is Microsoft Graph. 

## Dependencies

* Composer
* PHP 8.1 or greater
* MS Graph (inculded in Microsoft O365, M365, Developer Account)

**Note: Not all operations or request elements are supported on all versions of
Exchange.**

## Installation

The prefered installation method is via Composer, which will automatically
handle autoloading of classes.

```json
{
    "require": {
        "microsoft/microsoft-graph": "^1.81"
    }
}
```

## Usage

First register an new application in your MS Tenant. 
You need the following information:
* 'TEANT ID' (optional)
* 'CLIENT (APPLICATION) ID'
* 'CLIENT SECRET'

This information must be entered in the PHP File for using the connection

* `$tenantId`: (optional) Identificate your Tenant by its unique ID
* `$clientId`: The unique client ID for your application
* `$clientSecret`: The Secret(Password) for your Application

Your Application needs the rights to get in touch with MS Graph. 
So please check the configured permissions for your application in Azure AD. 
Standard the application gets the right User.Read


## Examples

The Example shows you to read Calendar Events from your own calendar. 
There are a lot of other options and information you will get from graph. 
Check here the [MS Graph Explorer](https://developer.microsoft.com/en-us/graph/graph-explorer) for testing and further information

If you want to get information from other users, like there calendarevents you need the Graph permission Calendar.ReadAll in your Azure AD.

## Resources
[MS Graph SDK PHP](https://github.com/microsoftgraph/msgraph-sdk-php)


## Support

All questions should use the [issue queue](https://github.com/trovanaffm/PHP-MSGraph/issues). This allows the community to
contribute to and benefit from questions or issues you may have. 
