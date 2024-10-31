package com.example.primeraplicacion

import android.os.Handler
import android.os.Looper
import java.io.BufferedReader
import java.io.DataOutputStream
import java.io.InputStreamReader
import java.net.HttpURLConnection
import java.net.URL
import java.util.concurrent.Executors

class Services {
    private val _URL = "http://10.0.2.2:2024";
    private val SERVICES = object {
        public val LOGIN = "services/login.php";
        public val REGISTER = "services/register.php";
    };

    private fun callService(endpoint:String, data:String): Any {
        val executor = Executors.newSingleThreadExecutor()
        val handler: Handler = Handler(Looper.getMainLooper())
        val resultado = object{
            var data = "";
            var statusCode = -1;
        };

        executor.execute {
            val postData: ByteArray = data.toByteArray(charset("UTF-8"))
            //val postDataLength = postData.size
            val request = "$_URL/$endpoint"
            val url = URL(request)
            val conn = url.openConnection() as HttpURLConnection
            conn.doOutput = true
            conn.instanceFollowRedirects = false
            conn.requestMethod = "POST"
            conn.setRequestProperty("Content-Type", "application/x-www-form-urlencoded")
            conn.setRequestProperty("charset", "utf-8")
            conn.setRequestProperty("User-Agent","Mozilla/5.0 ( compatible ) ");
            conn.setRequestProperty("Accept","*/*");
            //conn.setRequestProperty("Content-Length", postDataLength.toString())
            conn.useCaches = false
            DataOutputStream(conn.outputStream).use { wr ->
                wr.write(postData)
                wr.flush();
            }

            var result: String = ""
            var br: BufferedReader? = null
            if (conn.responseCode == 200) {
                br = BufferedReader(InputStreamReader(conn.inputStream))
                var strCurrentLine: String?
                while ((br.readLine().also { strCurrentLine = it }) != null) {
                    result = result + strCurrentLine
                }
            } else {
                br = BufferedReader(InputStreamReader(conn.errorStream))
                var strCurrentLine: String?
                while ((br.readLine().also { strCurrentLine = it }) != null) {
                    result = result + strCurrentLine
                }
            }


            handler.post(Runnable {
                //UI Thread work here
            });

            resultado.data = result;
            resultado.statusCode = conn.responseCode;
        }

        return resultado;
    }

    public fun registro(studentID:String, name:String, lastName:String, secondLastName:String) :Boolean {
        val studentID = "studentID=$studentID";
        val name = "name=$name";
        val lastName = "name=$lastName";
        val secondLastName = "name=$secondLastName";

        val registro = callService(
            SERVICES.REGISTER,
            "studentID=$studentID&password=$password");
        return login.statusCode === 200;
    }
}