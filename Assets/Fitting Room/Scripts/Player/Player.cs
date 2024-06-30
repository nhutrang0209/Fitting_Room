using System;
using System.Collections.Generic;
using System.IO;
using UnityEngine;

namespace Fitting_Room
{
    public class Player : MonoBehaviour
    {
        [Header("Clothing Manager")] 
        [SerializeField] private ClothingManager clothingManager;

        [Header("Animation")]
        [SerializeField] private AnimationController animator;
        
        [Header("Model")] 
        [SerializeField] private Transform modelTransform;

        [SerializeField] private float defaultHeight;
        [SerializeField] private float defaultWeight;
        
        [Header("Measurements")]
        [SerializeField] private Measurements measurements;
        [SerializeField] private string measureJsonPath;

        [Header("Round")] 
        [SerializeField] private RoundController roundController;

        public List<Clothing> ClothingInventory => clothingManager.ClothingInventory;

        public float Height => measurements.height;
        public float Weight => measurements.weight;
        public float V1 => measurements.v1;
        public float V2 => measurements.v2;
        public float V3 => measurements.v3;
        
        private Vector3 _originScale;

        private static Player _instance;
        public static Player Instance => _instance;

        private void Awake()
        {
            _instance = this;
            ChangeBody();
        }

        private void ChangeBody()
        {
            measurements = JsonFileHandler.ReadFromJson<Measurements>(measureJsonPath);
            
            ChangeHeight(Height);
            ChangeV1();
            ChangeV2();
            ChangeV3();
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

        private void ChangeV1()
        {
            roundController.ChangeV1(V1);
        }

        private void ChangeV2()
        {
            roundController.ChangeV2(V2);
        }

        private void ChangeV3()
        {
            roundController.ChangeV3(V3);
        }

        public void PutOn(Clothing clothing)
        {
            clothingManager.PutOn(clothing);
        }

        public void TakeOff(Clothing clothing)
        {
            clothingManager.TakeOff(clothing);
        }

        public void SetWalking(bool state)
        {
            animator.SetWalking(state);
        }
    }
}