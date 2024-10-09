using System;
using System.Diagnostics;

class Program
{
    static void Main(string[] args)
    {
        if (args.Length < 4)
        {
            Console.WriteLine("Usage: dotnet run <host_name> <ansible_host> <access_token> <host_alias>");
            return;
        }

        string hostName = args[0];
        string ansibleHost = args[1];
        string accessToken = args[2];
        string hostAlias = args[3];

        string scriptPath = "/opt/ansible/hosts_script.sh";
        string arguments = $"{hostName} {ansibleHost} {accessToken} {hostAlias}";

        var processInfo = new ProcessStartInfo("/bin/bash", $"{scriptPath} {arguments}")
        {
            RedirectStandardOutput = true,
            UseShellExecute = false,
            CreateNoWindow = true,
            WorkingDirectory = "/var/www/html"
        };

        try
        {
            using (var process = Process.Start(processInfo))
            {
                using (var reader = process.StandardOutput)
                {
                    string result = reader.ReadToEnd();
                    Console.WriteLine(result);
                }
            }
        }
        catch (Exception ex)
        {
            Console.WriteLine($"Error: {ex.Message}");
        }
    }
}

