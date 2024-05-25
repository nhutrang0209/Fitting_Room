using System;
using System.Collections.Generic;
using UnityEngine;

namespace Fitting_Room
{
    public class ClothingLoader : MonoBehaviour
    {
        [SerializeField] private List<ClothingData> clothingDataList;
        [SerializeField] private Transform root;
        [SerializeField] private SkinnedMeshRenderer skinMesh;

        private void Start()
        {
            Load();
        }

        private void Load()
        {
            foreach (var clothing in clothingDataList)
            {
                var obj = clothing.ModelFbx;
                var newObj = Instantiate(obj, root);
            }
        }
    }
}