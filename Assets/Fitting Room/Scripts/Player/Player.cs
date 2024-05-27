using System;
using System.Collections.Generic;
using UnityEngine;

namespace Fitting_Room
{
    public class Player : MonoBehaviour
    {
        [Header("Clothing Manager")] [SerializeField]
        private ClothingManager clothingManager;

        [Header("Model")] [SerializeField] private Transform modelTransform;

        [SerializeField] private float defaultHeight;
        [SerializeField] private float defaultWeight;

        public List<Clothing> ClothingInventory => clothingManager.ClothingInventory;

        private Vector3 _originScale;

        private static Player _instance;
        public static Player Instance => _instance;

        private void Awake()
        {
            _instance = this;
        }

        public void ChangeHeight(float newHeight)
        {

            _originScale = modelTransform.localScale;
            var newYScale = _originScale.y * newHeight / defaultHeight;

            var newScale = new Vector3(_originScale.x, newYScale, _originScale.z);

            modelTransform.localScale = newScale;
        }

        public void ChangeWeight(float newWeight)
        {
            _originScale = modelTransform.localScale;
            var newXScale = _originScale.x * newWeight / defaultWeight;
            var newScale = new Vector3(newXScale, _originScale.y, _originScale.z);
            modelTransform.localScale = newScale;
        }

        public void PutOn(Clothing clothing)
        {
            clothingManager.PutOn(clothing);
        }

        public void TakeOff(Clothing clothing)
        {
            clothingManager.TakeOff(clothing);
        }
    }
}