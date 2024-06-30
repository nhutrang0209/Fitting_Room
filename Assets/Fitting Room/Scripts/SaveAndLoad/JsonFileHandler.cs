using System.IO;
using UnityEngine;

namespace Fitting_Room
{
    public class JsonFileHandler : MonoBehaviour
    {
        public static void ClearJson(string path)
        {
            string jsonFilePath = Path.Combine(Application.dataPath, path);
            
            File.WriteAllText(jsonFilePath, "{}");
        }
        
        public static void WriteToJsonFile<T>(T obj, string path)
        {
            string jsonTxt = JsonUtility.ToJson(obj);
            string jsonFilePath = Path.Combine(Application.dataPath, path);
            
            if (!File.Exists(jsonFilePath))
            {
                File.Create(jsonFilePath).Dispose();
                ClearJson(path);
            }
            
            File.WriteAllText(jsonFilePath, jsonTxt);
        }

        public static T ReadFromJson<T>(string path)
        {
            string textFromJson = LoadTxtFromJson(path);

            return JsonUtility.FromJson<T>(textFromJson);
        }

        private static string LoadTxtFromJson(string path)
        {
            string jsonFilePath = Path.GetFullPath(Path.Combine(Application.dataPath, path));

            if (!File.Exists(jsonFilePath))
            {
                File.Create(jsonFilePath).Dispose();
                ClearJson(path);
            }
            
            return File.ReadAllText(jsonFilePath);
        }
    }
}