using System.Collections;
using System.Collections.Generic;
using System.IO;
using UnityEngine;
using UnityEngine.Networking;

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
        
        public static void ReadFromWebJson<T>(string path, System.Action<T> callback = null)
        {
            string url = path;
            Instance.StartCoroutine(LoadJsonFromWeb<T>(url, callback));
        }

        private static string LoadTxtFromJson(string path, bool web = false)
        {
            string jsonFilePath = Path.GetFullPath(Path.Combine(Application.dataPath, path));
            
            if (!File.Exists(jsonFilePath))
            {
                File.Create(jsonFilePath).Dispose();
                ClearJson(path);
            }
            
            return File.ReadAllText(jsonFilePath);
        }
        
        private static IEnumerator LoadJsonFromWeb<T>(string url, System.Action<T> callback)
        {
            using (UnityWebRequest request = UnityWebRequest.Get(url))
            {
                yield return request.SendWebRequest();

                if (request.result == UnityWebRequest.Result.ConnectionError || request.result == UnityWebRequest.Result.ProtocolError)
                {
                    Debug.LogError(request.error);
                }
                else
                {
                    string jsonText = request.downloadHandler.text;
                    Debug.Log(jsonText);
                    T data = JsonUtility.FromJson<T>(jsonText);
                    Debug.Log(data);
                    callback?.Invoke(data);
                }
            }
        }
        
        private static JsonFileHandler _instance;
        public static JsonFileHandler Instance
        {
            get
            {
                if (_instance == null)
                {
                    _instance = new GameObject("JsonFileHandler").AddComponent<JsonFileHandler>();
                }
                return _instance;
            }
        }
    }
}