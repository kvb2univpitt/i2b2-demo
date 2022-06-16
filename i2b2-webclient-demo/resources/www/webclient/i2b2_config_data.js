{
    urlProxy: "index.php",
    urlFramework: "js-i2b2/",
    startZoomed: true,
    lstDomains: [
		{
            name: "Local Demo",
            domain: "i2b2demo",
            urlCellPM: "http://127.0.0.1/i2b2/services/PMService/",
            allowAnalysis: true,
            registrationMethod: "",
            loginType: "local",
            showRegistration: true,
            debug: true
        },
        {
            name: "SAML Demo",
            domain: "i2b2demo",
            urlCellPM: "http://127.0.0.1/i2b2/services/PMService/",
            allowAnalysis: true,
            registrationMethod: "saml",
            loginType: "federated",
            showRegistration: true,
            debug: true
        }
    ]
}