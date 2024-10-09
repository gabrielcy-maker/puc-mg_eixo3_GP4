using System;
using System.Diagnostics;

class Program
{
    static void Main(string[] args)
    {
        // Verifica se o número de argumentos é menor do que 4
        if (args.Length != 4)
        {
            Console.WriteLine("Usage: dotnet run <host_name> <ansible_host> <access_token> <host_alias>");
            return;
        }

        string hostName = SanitizeInput(args[0]);
        string ansibleHost = SanitizeInput(args[1]);
        string accessToken = SanitizeInput(args[2]);
        string hostAlias = SanitizeInput(args[3]);

        string scriptPath = "/opt/ansible/hosts_script.sh";
        string arguments = $"{hostName} {ansibleHost} {accessToken} {hostAlias}";

        var processInfo = new ProcessStartInfo("/bin/bash", $"{scriptPath} {arguments}")
        {
            RedirectStandardOutput = true,
            RedirectStandardError = true, // Redireciona a saída de erro padrão
            UseShellExecute = false,
            CreateNoWindow = true,
            WorkingDirectory = "/var/www/html"
        };

        try
        {
            using (var process = Process.Start(processInfo))
            {
                if (process != null)
                {
                    using (var reader = process.StandardOutput)
                    {
                        string result = reader.ReadToEnd();
                        Console.WriteLine(result);
                    }

                    using (var errorReader = process.StandardError)
                    {
                        string errorResult = errorReader.ReadToEnd();
                        if (!string.IsNullOrEmpty(errorResult))
                        {
                            Console.WriteLine($"Error output: {errorResult}");
                        }
                    }

                    process.WaitForExit();
                    if (process.ExitCode != 0)
                    {
                        Console.WriteLine($"Script exited with code: {process.ExitCode}");
                    }
                }
                else
                {
                    Console.WriteLine("Failed to start process.");
                }
            }
        }
        catch (Exception ex)
        {
            Console.WriteLine($"Error: {ex.Message}");
        }
    }

    static string SanitizeInput(string input)
    {
        // Remove caracteres indesejados e realiza outras validações necessárias
        return input.Replace("\"", "").Replace("'", "").Replace(";", "");
    }
}

