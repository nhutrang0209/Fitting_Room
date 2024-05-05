using System;
using UnityEngine;

namespace Fitting_Room
{
    public class ClothesLoader : MonoBehaviour
    {
        [SerializeField] private Transform playerTransform;
        public Clothes clothesLoaded;
        [SerializeField] private Cloth cloth;
        
        private void Start()
        {
            ReadJsonFile("Clothes/Clothes.json");
            LoadGameObject();
        }

        private void ReadJsonFile(string path)
        {
            // Read Json file
            string myLoadedItem = LoadJsonAsResource(path);
            
            // Use Json Utility to map with Item
            clothesLoaded = JsonUtility.FromJson<Clothes>(myLoadedItem);
        }

        private static string LoadJsonAsResource(string path)
        {
            string jsonFilePath = path.Replace(".json", "");
            // Text asset = Text obj
            TextAsset loadedJsonFile = Resources.Load<TextAsset>(jsonFilePath);

            return loadedJsonFile.text;
        }

        private void LoadGameObject()
        {
            foreach (var clothArg in clothesLoaded.clothArgs)
            {
                
                string newName = clothArg.nameFbx.Replace(".prefab", "");
                Debug.Log(newName);
                
                GameObject fbxObj = Resources.Load<GameObject>("Models/" + newName);

                if (fbxObj)
                {
                    var newGo = Instantiate(fbxObj, playerTransform, true);
                    return;
                }
            }
        }

        private void ChangeConstraints(Cloth clothComponent, float maxDistance)
        {
            var newConstraints = clothComponent.coefficients;

            for(int i = 0; i< newConstraints.Length; ++i)
            {
                newConstraints[i].maxDistance = maxDistance;
            }

            clothComponent.coefficients = newConstraints;
        }
    }

    [Serializable]
    public class Clothes
    {
        public ClothArgs[] clothArgs;
    }

    [Serializable]
    public class ClothArgs
    {
        public string nameFbx;
        public string nameCloth;
        public string size;
    }
}